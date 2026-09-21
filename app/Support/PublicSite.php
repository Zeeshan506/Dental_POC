<?php

namespace App\Support;

use Illuminate\Http\Request;

class PublicSite
{
    /**
     * Resolve and persist a safe visual variant for the current request.
     */
    public static function resolveVariant(Request $request): string
    {
        $requestedVariant = strtolower((string) $request->query('variant', session('variant', 'a')));
        $variant = in_array($requestedVariant, ['a', 'b'], true) ? $requestedVariant : 'a';

        session(['variant' => $variant]);

        return $variant;
    }

    /**
     * Build the shared view contract for a public page.
     *
     * @return array{variant: string, clinic: array<string, mixed>, metadata: array<string, string>, page: array<string, mixed>}
     */
    public static function page(Request $request, string $pageKey, ?string $slug = null): array
    {
        $metadataKey = str_ends_with($pageKey, '.show') ? explode('.', $pageKey)[0] : $pageKey;
        $page = config("site.pages.{$metadataKey}");

        abort_unless(is_array($page), 404);

        $resource = match ($pageKey) {
            'services.show' => self::resource('services', $slug),
            'team.show' => self::resource('team', $slug),
            default => null,
        };
        $resources = match ($pageKey) {
            'services' => self::resources('services'),
            'team' => self::resources('team'),
            default => [],
        };

        if ($resource !== null) {
            $page = [
                'title' => $resource['name'],
                'description' => $resource['introduction'] ?? $resource['details'] ?? '',
                'heading' => $resource['name'],
                'intro' => $resource['introduction'] ?? $resource['details'] ?? '',
            ];
        }

        $path = '/'.ltrim($request->path(), '/');
        $path = $path === '/' ? '/' : rtrim($path, '/');

        return [
            'variant' => self::resolveVariant($request),
            'clinic' => config('clinic'),
            'metadata' => [
                'title' => ($page['title'] ?? config('clinic.name')).' | '.config('clinic.name'),
                'description' => $page['description'] ?? config('clinic.description'),
                'canonical_path' => $path,
            ],
            'page' => array_merge($page, ['key' => $pageKey, 'resource' => $resource, 'resources' => $resources]),
        ];
    }

    /**
     * Resolve a configured record by its stable public slug.
     *
     * @return array<string, mixed>
     */
    private static function resource(string $type, ?string $slug): array
    {
        foreach (self::resources($type) as $record) {
            if (is_array($record) && ($record['slug'] ?? null) === $slug) {
                return $record;
            }
        }

        abort(404);
    }

    /**
     * Normalize the configured collection before either list or detail rendering.
     *
     * @return array<int, array<string, mixed>>
     */
    private static function resources(string $type): array
    {
        return array_values(array_map(
            fn (mixed $record): array => self::normalizeResource($type, is_array($record) ? $record : []),
            config("site.{$type}", []),
        ));
    }

    /**
     * Keep incomplete client configuration presentable without inventing claims.
     *
     * @param  array<string, mixed>  $record
     * @return array<string, mixed>
     */
    private static function normalizeResource(string $type, array $record): array
    {
        if ($type === 'services') {
            $configuredCta = is_array($record['cta'] ?? null) ? $record['cta'] : [];
            $ctaLabel = is_string($configuredCta['label'] ?? null) ? trim($configuredCta['label']) : '';
            $ctaPath = is_string($configuredCta['path'] ?? null) ? trim($configuredCta['path']) : '';

            return array_merge([
                'name' => 'Service information pending approval',
                'introduction' => 'Service information is pending client approval.',
                'suitability' => 'Suitability requires an individual clinical assessment.',
                'process' => 'The clinical team will discuss appropriate next steps during consultation.',
                'benefits' => [],
                'technology' => 'Technology and materials require clinician confirmation.',
                'cta' => ['label' => 'Discuss this service', 'path' => '/contact'],
            ], $record, [
                'name' => self::textOrDefault($record['name'] ?? null, 'Service information pending approval'),
                'introduction' => self::textOrDefault($record['introduction'] ?? null, 'Service information is pending client approval.'),
                'suitability' => self::textOrDefault($record['suitability'] ?? null, 'Suitability requires an individual clinical assessment.'),
                'process' => self::textOrDefault($record['process'] ?? null, 'The clinical team will discuss appropriate next steps during consultation.'),
                'benefits' => is_array($record['benefits'] ?? null) ? $record['benefits'] : [],
                'technology' => self::textOrDefault($record['technology'] ?? null, 'Technology and materials require clinician confirmation.'),
                'cta' => [
                    'label' => $ctaLabel !== '' ? $ctaLabel : 'Discuss this service',
                    'path' => str_starts_with($ctaPath, '/') ? $ctaPath : '/contact',
                ],
            ]);
        }

        return array_merge([
            'name' => 'Team profile pending approval',
            'details' => 'This profile is pending client approval.',
            'role' => 'Profile pending client approval',
            'approved' => false,
        ], $record, [
            'name' => self::textOrDefault($record['name'] ?? null, 'Team profile pending approval'),
            'details' => self::textOrDefault($record['details'] ?? null, 'This profile is pending client approval.'),
            'role' => self::textOrDefault($record['role'] ?? null, 'Profile pending client approval'),
        ]);
    }

    private static function textOrDefault(mixed $value, string $default): string
    {
        $text = is_string($value) ? trim($value) : '';

        return $text !== '' ? $text : $default;
    }
}
