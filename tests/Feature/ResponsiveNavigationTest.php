<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResponsiveNavigationTest extends TestCase
{
    public function test_variant_a_homepage_omits_its_decorative_identifier_and_retains_hero_content(): void
    {
        $this->get('/?variant=a')
            ->assertOk()
            ->assertSee('data-testid="variant-a-hero"', false)
            ->assertDontSee('Variant A &bull; Expressive 2D Cutout', false)
            ->assertSee('Calm, architectural dentistry crafted for lifelong wellness.')
            ->assertSee('Book Initial Consultation')
            ->assertSee('Explore Treatments');
    }

    public function test_variant_b_homepage_omits_its_decorative_identifier_and_retains_hero_content(): void
    {
        $this->get('/?variant=b')
            ->assertOk()
            ->assertSee('data-testid="variant-b-hero"', false)
            ->assertDontSee('Variant B &bull; Calm Editorial Direction', false)
            ->assertSee('Restorative, invisible, and')
            ->assertSee('Begin Consultation Dialogue')
            ->assertSee('View Clinical Disciplines');
    }

    public function test_mobile_navigation_renders_a_labelled_native_disclosure_with_active_links_and_contact_cta(): void
    {
        $content = $this->get('/services/dental-implants?variant=a')
            ->assertOk()
            ->getContent();

        $this->assertStringContainsString('data-testid="mobile-navigation-disclosure"', $content);
        $this->assertStringContainsString('aria-label="Open primary navigation"', $content);
        $this->assertStringContainsString('id="mobile-primary-navigation"', $content);
        $this->assertStringContainsString('data-testid="mobile-navigation-contact"', $content);
        $this->assertStringContainsString('aria-current="page"', $content);
        $this->assertStringContainsString('min-h-[44px]', $content);
        $this->assertStringContainsString('w-[min(20rem,calc(100vw-2rem))]', $content);
        $this->assertStringContainsString('hidden lg:inline-flex', $content);
    }

    public function test_all_public_routes_render_the_global_overflow_guard_and_reachable_switcher(): void
    {
        $paths = [
            '/',
            '/about',
            '/services',
            '/services/'.config('site.services.0.slug'),
            '/team',
            '/team/'.config('site.team.0.slug'),
            '/patient-journey',
            '/reviews',
            '/contact',
            '/faq',
            '/privacy',
            '/terms',
        ];

        foreach (['a', 'b'] as $variant) {
            foreach ($paths as $path) {
                $content = $this->get($path.'?variant='.$variant)
                    ->assertOk()
                    ->getContent();

                $this->assertStringContainsString('overflow-x-clip', $content);
                $this->assertStringContainsString('data-testid="variant-switcher"', $content);
                $this->assertStringContainsString('max-w-[calc(100vw-1rem)]', $content);
            }
        }
    }
}
