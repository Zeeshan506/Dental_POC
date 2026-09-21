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
            'page' => array_merge($page, ['key' => $pageKey, 'resource' => $resource]),
        ];
    }

    /**
     * Resolve a configured record by its stable public slug.
     *
     * @return array<string, mixed>
     */
    private static function resource(string $type, ?string $slug): array
    {
        foreach (config("site.{$type}", []) as $record) {
            if (is_array($record) && ($record['slug'] ?? null) === $slug) {
                return $record;
            }
        }

        abort(404);
    }
}
