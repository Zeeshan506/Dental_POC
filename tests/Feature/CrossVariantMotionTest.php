<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CrossVariantMotionTest extends TestCase
{
    public function test_every_public_route_renders_the_shared_once_only_motion_contract_for_both_variants(): void
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

        foreach (['a' => 'expressive', 'b' => 'editorial'] as $variant => $profile) {
            foreach ($paths as $path) {
                $content = $this->get($path.'?variant='.$variant)
                    ->assertOk()
                    ->getContent();

                $this->assertStringContainsString('data-motion-profile="'.$profile.'"', $content);
                $this->assertStringContainsString('data-motion="fade"', $content);
                $this->assertStringContainsString('data-motion="headline"', $content);
                $this->assertStringContainsString('data-motion="group"', $content);
                $this->assertStringContainsString('data-motion="action"', $content);
                $this->assertGreaterThanOrEqual(8, substr_count($content, 'data-motion='), $path.' lacks meaningful motion coverage.');
            }
        }
    }

    public function test_motion_runtime_uses_one_observer_and_keeps_mobile_staggers_at_zero(): void
    {
        $script = File::get(resource_path('js/app.js'));

        $this->assertSame(1, substr_count($script, 'new IntersectionObserver'));
        $this->assertStringContainsString("window.matchMedia('(max-width: 767px)').matches", $script);
        $this->assertStringContainsString('return 0;', $script);
        $this->assertStringContainsString('observer.unobserve(entry.target)', $script);
        $this->assertStringContainsString("document.documentElement.dataset.motionProfile === 'editorial'", $script);
    }

    public function test_no_javascript_and_reduced_motion_contracts_keep_content_visible_without_delay(): void
    {
        $response = $this->get('/contact?variant=b');
        $stylesheet = File::get(resource_path('css/app.css'));

        $response
            ->assertOk()
            ->assertDontSee('motion-ready', false)
            ->assertSee('data-consultation-form', false);
        $this->assertStringContainsString('.motion-ready [data-motion].motion-pending', $stylesheet);
        $this->assertStringContainsString('@media (prefers-reduced-motion: reduce)', $stylesheet);
        $this->assertStringContainsString('[data-motion] {', $stylesheet);
        $this->assertStringContainsString('opacity: 1 !important', $stylesheet);
    }
}
