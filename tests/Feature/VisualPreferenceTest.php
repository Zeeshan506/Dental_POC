<?php

namespace Tests\Feature;

use Tests\TestCase;

class VisualPreferenceTest extends TestCase
{
    public function test_defaults_render_the_warm_stone_source_work_system(): void
    {
        $response = $this->get('/');

        $response->assertSee('data-palette="warm-stone"', false);
        $response->assertSee('data-typeface="source-work"', false);
        $response->assertSessionHas('palette', 'warm-stone');
        $response->assertSessionHas('typeface', 'source-work');
    }

    public function test_valid_preferences_render_and_persist_for_every_supported_pair(): void
    {
        $pairs = [
            ['porcelain-teal', 'newsreader-manrope'],
            ['ivory-rosewood', 'source-work'],
            ['mineral-blue', 'newsreader-manrope'],
        ];

        foreach ($pairs as [$palette, $typeface]) {
            $response = $this->get("/about?palette={$palette}&typeface={$typeface}");

            $response->assertSee("data-palette=\"{$palette}\"", false);
            $response->assertSee("data-typeface=\"{$typeface}\"", false);
            $response->assertSessionHas('palette', $palette);
            $response->assertSessionHas('typeface', $typeface);
        }
    }

    public function test_session_preferences_render_when_queries_are_absent(): void
    {
        $response = $this->withSession(['palette' => 'ivory-rosewood', 'typeface' => 'newsreader-manrope'])
            ->get('/services');

        $response->assertSee('data-palette="ivory-rosewood"', false);
        $response->assertSee('data-typeface="newsreader-manrope"', false);
        $response->assertSessionHas('palette', 'ivory-rosewood');
        $response->assertSessionHas('typeface', 'newsreader-manrope');
    }

    public function test_invalid_preference_queries_fall_back_to_safe_defaults(): void
    {
        $response = $this->withSession(['palette' => 'mineral-blue', 'typeface' => 'newsreader-manrope'])
            ->get('/?palette=invalid&typeface=invalid');

        $response->assertSee('data-palette="warm-stone"', false);
        $response->assertSee('data-typeface="source-work"', false);
        $response->assertSessionHas('palette', 'warm-stone');
        $response->assertSessionHas('typeface', 'source-work');
    }

    public function test_switcher_links_preserve_the_path_variant_and_unrelated_queries(): void
    {
        $response = $this->get('/services/dental-implants?campaign=autumn&variant=b&palette=ivory-rosewood&typeface=newsreader-manrope');

        $response->assertSee('data-testid="switcher-variant-a"', false);
        $response->assertSee('data-testid="switcher-palette-porcelain-teal"', false);
        $response->assertSee('data-testid="switcher-typeface-source-work"', false);
        $response->assertSee('/services/dental-implants?campaign=autumn&amp;variant=a&amp;palette=ivory-rosewood&amp;typeface=newsreader-manrope', false);
        $response->assertSee('/services/dental-implants?campaign=autumn&amp;variant=b&amp;palette=porcelain-teal&amp;typeface=newsreader-manrope', false);
        $response->assertSee('/services/dental-implants?campaign=autumn&amp;variant=b&amp;palette=ivory-rosewood&amp;typeface=source-work', false);
        $response->assertSee('aria-current="true"', false);
    }

    public function test_palette_tokens_and_font_options_are_centrally_defined(): void
    {
        $preferences = config('design-preferences');
        $styles = strtolower((string) file_get_contents(resource_path('css/app.css')));
        $viteConfig = (string) file_get_contents(base_path('vite.config.js'));

        $this->assertSame('warm-stone', $preferences['defaults']['palette']);
        $this->assertSame('source-work', $preferences['defaults']['typeface']);
        $this->assertCount(4, $preferences['palettes']);
        $this->assertCount(2, $preferences['typefaces']);

        foreach ($preferences['palettes'] as $palette) {
            foreach ($palette['tokens'] as $token) {
                $this->assertStringContainsString(strtolower($token), $styles);
            }
        }

        $this->assertStringContainsString("html[data-typeface='newsreader-manrope']", $styles);
        $this->assertStringContainsString("bunny('Newsreader'", $viteConfig);
        $this->assertStringContainsString("bunny('Manrope'", $viteConfig);
        $this->assertStringNotContainsString('Cormorant Garamond', $viteConfig);
    }
}
