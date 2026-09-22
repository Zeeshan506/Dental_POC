<?php

namespace Tests\Feature;

use Tests\TestCase;

class VariantATest extends TestCase
{
    public function test_hero_cutout_renders_content_and_ctas(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-hero"', false);
        $response->assertDontSee('Variant A &bull; Expressive 2D Cutout', false);
        $response->assertSee('Calm, architectural dentistry crafted for lifelong wellness.');
        $response->assertSee(config('clinic.description'));
        $response->assertSee('Book Initial Consultation');
        $response->assertSee(config('clinic.contact.whatsapp_url'));
        $response->assertSee('Explore Treatments');
        $response->assertSee('href="#treatments"', false);
        $response->assertSee('data-motion="headline"', false);
    }

    public function test_clinical_leadership_renders_doctor_details_and_accreditations(): void
    {
        $response = $this->get('/?variant=a');

        $doctor = config('clinic.doctor');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-doctor"', false);
        $response->assertSee($doctor['name']);
        $response->assertSee($doctor['title']);
        $response->assertSee($doctor['credentials']);
        $response->assertSee($doctor['philosophy']);
        $response->assertSee($doctor['bio']);

        foreach ($doctor['accreditations'] as $accreditation) {
            $response->assertSee($accreditation);
        }
    }

    public function test_treatments_section_renders_all_four_categories_and_highlights(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-treatments"', false);

        $treatments = config('clinic.treatments');
        $this->assertCount(4, $treatments);

        foreach ($treatments as $treatment) {
            $response->assertSee($treatment['title']);
            $response->assertSee($treatment['tagline']);
            $response->assertSee($treatment['description']);

            foreach ($treatment['highlights'] as $highlight) {
                $response->assertSee($highlight);
            }
        }
    }

    public function test_patient_journey_renders_all_five_steps_sequentially(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-journey"', false);

        $journey = config('clinic.journey');
        $this->assertCount(5, $journey);

        foreach ($journey as $step) {
            $response->assertSee('data-testid="journey-step-'.$step['step'].'"', false);
            $response->assertSee($step['title']);
            $response->assertSee($step['description']);
        }
    }

    public function test_booking_finale_renders_location_hours_and_contact_ctas(): void
    {
        $response = $this->get('/?variant=a');

        $clinic = config('clinic');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-booking-finale"', false);
        $response->assertSee($clinic['contact']['address']['line1']);
        $response->assertSee($clinic['contact']['address']['city']);
        $response->assertSee($clinic['contact']['address']['state']);
        $response->assertSee($clinic['contact']['address']['postal_code']);
        $response->assertSee('Open Directions in Google Maps');

        foreach ($clinic['hours']['schedule'] as $item) {
            $response->assertSee($item['days']);
            $response->assertSee($item['hours']);
        }

        $response->assertSee($clinic['hours']['emergency']);
        $response->assertSee($clinic['contact']['phone']);
        $response->assertSee($clinic['contact']['whatsapp_url']);
    }

    public function test_interactive_elements_meet_minimum_touch_target_requirements(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);
        $content = $response->getContent();

        // Verify min-h-[44px] is applied to key interactive CTA buttons
        $this->assertStringContainsString('min-h-[44px]', $content);
        $this->assertGreaterThanOrEqual(4, substr_count($content, 'min-h-[44px]'));
    }

    public function test_reduced_motion_rules_present_in_stylesheet(): void
    {
        $cssPath = resource_path('css/app.css');
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);
        $this->assertStringContainsString('prefers-reduced-motion: reduce', $css);
        $this->assertStringContainsString('.motion-ready [data-motion].motion-pending', $css);
        $this->assertStringContainsString('.animate-cutout-settle', $css);
        $this->assertStringContainsString('animation: none !important', $css);
    }

    public function test_variant_a_renders_semantic_motion_hooks_for_each_chapter(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertSee('data-motion="headline"', false);
        $response->assertSee('data-motion="mask"', false);
        $response->assertSee('data-motion="timeline"', false);
        $response->assertSee('data-motion-stagger="90"', false);
        $response->assertSee('data-motion-interactive', false);
    }

    public function test_shared_motion_hooks_render_for_both_variants_without_server_side_hidden_states(): void
    {
        foreach (['a', 'b'] as $variant) {
            $response = $this->get('/?variant='.$variant);

            $response->assertSee('data-motion="fade"', false);
            $response->assertSee('data-testid="variant-switcher"', false);
            $response->assertDontSee('motion-pending', false);
        }
    }

    public function test_zero_gradients_in_variant_a_views_and_css(): void
    {
        $filesToInspect = [
            resource_path('css/app.css'),
            resource_path('views/variants/a/index.blade.php'),
            resource_path('views/components/variant-a/hero-cutout.blade.php'),
            resource_path('views/components/variant-a/doctor-card.blade.php'),
            resource_path('views/components/variant-a/treatment-tile.blade.php'),
            resource_path('views/components/variant-a/journey-step.blade.php'),
            resource_path('views/components/variant-a/booking-finale.blade.php'),
        ];

        $gradientKeywords = ['linear-gradient', 'radial-gradient', 'conic-gradient', 'bg-gradient-'];

        foreach ($filesToInspect as $filePath) {
            $this->assertFileExists($filePath);
            $content = file_get_contents($filePath);

            foreach ($gradientKeywords as $keyword) {
                $this->assertStringNotContainsString(
                    $keyword,
                    $content,
                    "Found prohibited gradient keyword '{$keyword}' in {$filePath}"
                );
            }
        }
    }

    public function test_photographic_cutouts_and_real_map_rendered(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);

        // Verify primary intentional visual compositions are retained
        $response->assertSee('images/variant-a/dentist-cutout.webp');
        $response->assertSee('images/variant-a/tooth-anatomy.webp');
        $response->assertSee('images/variant-a/clinic-map.webp');
        $response->assertSee('OpenStreetMap');
        $response->assertSee('Demo Location');

        // Verify scrapbook-like floating image stickers have been removed
        $response->assertDontSee('images/variant-a/dental-tools.webp');
        $response->assertDontSee('images/variant-a/smile.webp');
        $response->assertDontSee('images/variant-a/implant.webp');
        $response->assertDontSee('images/variant-a/child-toothbrush.webp');
        $response->assertDontSee('images/variant-a/tooth-model.webp');
        $response->assertDontSee('images/variant-a/dental-xray.webp');
    }
}
