<?php

namespace Tests\Feature;

use Tests\TestCase;

class MultiPageSharedFoundationTest extends TestCase
{
    public function test_every_public_route_renders_for_each_variant_with_a_semantic_heading(): void
    {
        $routes = [
            '/' => 'Dental Care',
            '/about' => 'A considered approach to dental care',
            '/services' => 'Treatment information',
            '/services/dental-implants' => 'Dental Implants',
            '/team' => 'The people behind your care',
            '/team/dr-tariq-bhatti' => 'Dr. Tariq Bhatti',
            '/patient-journey' => 'A clear, unhurried journey',
            '/reviews' => 'Review presentation',
            '/contact' => 'Start a consultation dialogue',
            '/faq' => 'Frequently asked questions',
            '/privacy' => 'Privacy policy pending approval',
            '/terms' => 'Terms of use pending approval',
        ];

        foreach ($routes as $path => $heading) {
            foreach (['a', 'b'] as $variant) {
                $response = $this->get($path.'?variant='.$variant);

                $response->assertOk();
                $response->assertSessionHas('variant', $variant);
                $response->assertSee('data-testid="variant-switcher"', false);
                $response->assertSee($heading);

                if ($path !== '/') {
                    $response->assertSee('<h1', false);
                    $response->assertSee('data-testid="page-heading"', false);
                }
            }
        }
    }

    public function test_variant_switcher_preserves_the_current_path_and_non_variant_query_parameters(): void
    {
        $response = $this->get('/services/dental-implants?campaign=autumn&variant=b');

        $response->assertOk();
        $response->assertSessionHas('variant', 'b');
        $response->assertSee('/services/dental-implants?campaign=autumn&amp;variant=a', false);
        $response->assertSee('/services/dental-implants?campaign=autumn&amp;variant=b', false);
    }

    public function test_invalid_variants_fall_back_to_a_and_unknown_resources_are_not_found(): void
    {
        $this->get('/about?variant=not-a-variant')
            ->assertOk()
            ->assertSessionHas('variant', 'a')
            ->assertSee('Expressive 2D foundation');

        $this->get('/services/unknown-service?variant=b')->assertNotFound();
        $this->get('/team/unknown-member?variant=a')->assertNotFound();
        $this->get('/unknown-route?variant=b')->assertNotFound();
    }

    public function test_session_variant_is_used_when_a_query_variant_is_absent(): void
    {
        $this->withSession(['variant' => 'b'])
            ->get('/about')
            ->assertOk()
            ->assertSessionHas('variant', 'b')
            ->assertSee('Calm editorial foundation');
    }

    public function test_structured_site_content_drives_navigation_metadata_and_public_resource_views(): void
    {
        $response = $this->get('/services?variant=a');

        $response->assertOk();
        $response->assertSee('<title>Treatments | Dr. Bhatti &amp; Associates</title>', false);
        $response->assertSee('name="description" content="Explore informational summaries of the clinic’s treatment areas."', false);
        $response->assertSee('<link rel="canonical" href="'.url('/services').'">', false);
        $response->assertSee('data-placeholder="client-approved-open-graph-image-required"', false);

        foreach (config('site.navigation') as $item) {
            $response->assertSee($item['label']);
        }

        foreach (config('site.services') as $service) {
            $response->assertSee($service['name']);
            $response->assertSee($service['introduction']);
        }
    }

    public function test_primary_navigation_has_active_keyboard_and_mobile_contracts_without_detail_page_clutter(): void
    {
        $response = $this->get('/about?variant=a');

        $response->assertOk();
        $response->assertSee('aria-label="Primary navigation"', false);
        $response->assertSee('aria-label="Mobile primary navigation"', false);
        $response->assertSee('aria-current="page"', false);
        $response->assertSee('min-h-[44px]', false);
        $response->assertSee('focus-visible:ring-2', false);
        $response->assertDontSee('Dental Implants</a>', false);

        $this->get('/services/dental-implants?variant=a')
            ->assertOk()
            ->assertSee('aria-current="page"', false);
        $this->get('/team/dr-tariq-bhatti?variant=b')
            ->assertOk()
            ->assertSee('aria-current="page"', false);
    }

    public function test_placeholder_and_approval_requirements_are_explicit_without_a_review_destination(): void
    {
        $reviews = $this->get('/reviews?variant=b');
        $team = $this->get('/team/supporting-team-member?variant=a');
        $privacy = $this->get('/privacy?variant=a');

        $reviews->assertOk()->assertSee(config('site.reviews.notice'));
        $reviews->assertSee('Placeholder review — approval required');
        $reviews->assertDontSee('maps.google.com', false);
        $home = $this->get('/?variant=a');
        $home->assertDontSee('maps.google.com', false);
        $this->assertGreaterThanOrEqual(count(config('clinic.reviews')), substr_count($home->getContent(), 'Placeholder review — client approval required'));
        $team->assertOk()->assertSee('Profile pending client approval')->assertSee('Profile status: client approval required.');
        $privacy->assertOk()->assertSee(config('site.legal.notice'));
    }

    public function test_consultation_form_is_a_client_only_accessible_contract(): void
    {
        $response = $this->get('/contact?variant=a');

        $response->assertOk();
        $response->assertSee('data-consultation-form', false);
        $response->assertSee('novalidate', false);
        $response->assertSee('aria-live="polite"', false);
        $response->assertSee('POC only: this form validates in your browser', false);
        $response->assertDontSee('<form action=', false);

        $script = file_get_contents(resource_path('js/consultation-form.js'));
        $this->assertStringContainsString('event.preventDefault()', $script);
        $this->assertStringContainsString('no appointment was created', $script);
        $this->assertStringNotContainsString('fetch(', $script);
        $this->assertStringNotContainsString('XMLHttpRequest', $script);
    }

    public function test_shared_foundation_uses_the_existing_single_motion_runtime_with_a_no_javascript_fallback(): void
    {
        $response = $this->get('/about?variant=b');
        $script = file_get_contents(resource_path('js/app.js'));

        $response->assertOk();
        $response->assertSee('A considered approach to dental care');
        $response->assertDontSee('motion-pending', false);
        $this->assertSame(1, substr_count($script, 'new IntersectionObserver'));
        $this->assertStringContainsString('prefers-reduced-motion: reduce', file_get_contents(resource_path('css/app.css')));
    }

    public function test_incomplete_configured_resources_have_safe_metadata_and_detail_defaults(): void
    {
        config(['site.services' => [['slug' => 'incomplete-service']]]);

        $this->get('/services?variant=a')
            ->assertOk()
            ->assertSee('Service information pending approval')
            ->assertSee('Service information is pending client approval.');
        $this->get('/services/incomplete-service?variant=a')
            ->assertOk()
            ->assertSee('Service information pending approval')
            ->assertSee('Suitability requires an individual clinical assessment.')
            ->assertSee('Technology and materials require clinician confirmation.');

        config(['site.team' => [['slug' => 'incomplete-member']]]);

        $this->get('/team?variant=b')
            ->assertOk()
            ->assertSee('Team profile pending approval')
            ->assertSee('Profile pending client approval');
        $this->get('/team/incomplete-member?variant=b')
            ->assertOk()
            ->assertSee('This profile is pending client approval.');
    }
}
