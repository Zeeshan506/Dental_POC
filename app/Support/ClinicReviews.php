<?php

namespace App\Support;

class ClinicReviews
{
    /**
     * Retrieve all reviews with normalized fallbacks.
     *
     * @return array<int, array{
     *     id: string,
     *     patient_name: string,
     *     rating: int,
     *     excerpt: string,
     *     full_text: string,
     *     source: string,
     *     source_url: string,
     *     date: string,
     *     treatment: string
     * }>
     */
    public static function all(): array
    {
        $raw = config('clinic.reviews', []);
        if (! is_array($raw)) {
            return [];
        }

        return array_map([self::class, 'normalize'], $raw);
    }

    /**
     * Find a review by ID.
     *
     * @return array{id: string, patient_name: string, rating: int, excerpt: string, full_text: string, source: string, source_url: string, date: string, treatment: string}|null
     */
    public static function find(string $id): ?array
    {
        foreach (self::all() as $review) {
            if (($review['id'] ?? '') === $id) {
                return $review;
            }
        }

        return null;
    }

    /**
     * Normalize review data ensuring all required keys exist with safe defaults.
     *
     * @param  array<string, mixed>  $item
     * @return array{id: string, patient_name: string, rating: int, excerpt: string, full_text: string, source: string, source_url: string, date: string, treatment: string}
     */
    public static function normalize(array $item): array
    {
        return [
            'id' => (string) ($item['id'] ?? uniqid('rev-')),
            'patient_name' => (string) ($item['patient_name'] ?? 'Patient Review'),
            'rating' => max(1, min(5, (int) ($item['rating'] ?? 5))),
            'excerpt' => (string) ($item['excerpt'] ?? ''),
            'full_text' => (string) ($item['full_text'] ?? ($item['excerpt'] ?? '')),
            'source' => (string) ($item['source'] ?? 'Placeholder review — client approval required'),
            'source_url' => (string) ($item['source_url'] ?? ''),
            'date' => (string) ($item['date'] ?? ''),
            'treatment' => (string) ($item['treatment'] ?? 'Clinical Care'),
        ];
    }
}
