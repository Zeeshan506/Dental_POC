<?php

namespace App\Support;

use Illuminate\Contracts\View\View;
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
     * Resolve the appropriate view for a public page contract.
     */
    public static function view(Request $request, string $pageKey, ?string $slug = null): View
    {
        $contract = self::page($request, $pageKey, $slug);
        $viewKey = str_replace('.', '-', $pageKey);
        $variantView = "variants.{$contract['variant']}.{$viewKey}";

        if (view()->exists($variantView)) {
            return view($variantView, $contract);
        }

        return view('public.page', $contract);
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
        $resources = [];

        foreach (config("site.{$type}", []) as $record) {
            $slug = is_array($record) && is_string($record['slug'] ?? null) ? trim($record['slug']) : '';

            if (! preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
                continue;
            }

            $record['slug'] = $slug;
            $resources[] = self::normalizeResource($type, $record);
        }

        return $resources;
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
                'faqs' => [],
                'related' => [],
                'cta' => ['label' => 'Discuss this service', 'path' => '/contact'],
            ], $record, [
                'name' => self::textOrDefault($record['name'] ?? null, 'Service information pending approval'),
                'introduction' => self::textOrDefault($record['introduction'] ?? null, 'Service information is pending client approval.'),
                'suitability' => self::textOrDefault($record['suitability'] ?? null, 'Suitability requires an individual clinical assessment.'),
                'process' => self::textOrDefault($record['process'] ?? null, 'The clinical team will discuss appropriate next steps during consultation.'),
                'benefits' => self::benefits($record['benefits'] ?? []),
                'technology' => self::textOrDefault($record['technology'] ?? null, 'Technology and materials require clinician confirmation.'),
                'faqs' => self::faqs($record['faqs'] ?? []),
                'related' => self::relatedServices($record['related'] ?? []),
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

    /**
     * @return array<int, string>
     */
    private static function benefits(mixed $benefits): array
    {
        if (! is_array($benefits)) {
            return [];
        }

        return array_values(array_filter(array_map(
            fn (mixed $benefit): string => self::textOrDefault($benefit, ''),
            $benefits,
        )));
    }

    /**
     * @return array<int, array{question: string, answer: string}>
     */
    private static function faqs(mixed $faqs): array
    {
        if (! is_array($faqs)) {
            return [];
        }

        $items = [];
        foreach ($faqs as $question => $answer) {
            $question = self::textOrDefault($question, '');
            $answer = self::textOrDefault($answer, '');

            if ($question !== '' && $answer !== '') {
                $items[] = compact('question', 'answer');
            }
        }

        return $items;
    }

    /**
     * @return array<int, string>
     */
    private static function relatedServices(mixed $services): array
    {
        if (! is_array($services)) {
            return [];
        }

        return array_values(array_filter($services, fn (mixed $slug): bool => is_string($slug) && preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug) === 1));
    }
}
