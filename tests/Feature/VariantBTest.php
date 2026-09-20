<?php

namespace Tests\Feature;

use Tests\TestCase;

class VariantBTest extends TestCase
{
    public function test_hero_editorial_renders_content_and_ctas(): void
    {
        $response = $this->get('/?variant=b');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-hero"', false);
        $response->assertSee('Calm Editorial Direction');
        $response->assertSee('Restorative, invisible, and');
        $response->assertSee('utterly calm');
        $response->assertSee(config('clinic.description'));
        $response->assertSee('Begin Consultation Dialogue');
        $response->assertSee(config('clinic.contact.whatsapp_url'));
        $response->assertSee('View Clinical Disciplines');
        $response->assertSee('href="#treatments"', false);
        $response->assertSee('animate-editorial-settle');
    }

    public function test_clinical_director_renders_doctor_details_and_accreditations(): void
    {
        $response = $this->get('/?variant=b');

        $doctor = config('clinic.doctor');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-doctor"', false);
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
        $response = $this->get('/?variant=b');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-treatments"', false);

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
        $response = $this->get('/?variant=b');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-journey"', false);

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
        $response = $this->get('/?variant=b');

        $clinic = config('clinic');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-booking-finale"', false);
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
        $response = $this->get('/?variant=b');

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
        $this->assertStringContainsString('.animate-editorial-settle', $css);
        $this->assertStringContainsString('animation: none !important', $css);
    }

    public function test_zero_gradients_in_variant_b_views_and_css(): void
    {
        $filesToInspect = [
            resource_path('css/app.css'),
            resource_path('views/variants/b/index.blade.php'),
            resource_path('views/components/variant-b/hero-editorial.blade.php'),
            resource_path('views/components/variant-b/doctor-portrait.blade.php'),
            resource_path('views/components/variant-b/treatment-row.blade.php'),
            resource_path('views/components/variant-b/journey-timeline.blade.php'),
            resource_path('views/components/variant-b/booking-finale.blade.php'),
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
}
