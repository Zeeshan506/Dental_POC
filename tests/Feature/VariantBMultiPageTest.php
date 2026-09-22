<?php

namespace Tests\Feature;

use Tests\TestCase;

class VariantBMultiPageTest extends TestCase
{
    public function test_variant_b_renders_all_public_pages_with_editorial_page_header_and_correct_h1(): void
    {
        $routes = [
            '/about' => 'A considered approach to dental care',
            '/services' => 'Treatment information',
            '/services/dental-implants' => 'Dental Implants',
            '/team' => 'The people behind your care',
            '/team/dr-tariq-bhatti' => 'Dr. Tariq Bhatti',
            '/team/supporting-team-member' => 'Supporting team member',
            '/patient-journey' => 'A clear, unhurried journey',
            '/reviews' => 'Review presentation',
            '/contact' => 'Start a consultation dialogue',
            '/faq' => 'Frequently asked questions',
            '/privacy' => 'Privacy policy pending approval',
            '/terms' => 'Terms of use pending approval',
        ];

        foreach ($routes as $path => $heading) {
            $response = $this->get($path.'?variant=b');

            $response->assertOk();
            $response->assertSessionHas('variant', 'b');
            $response->assertDontSee('Calm editorial foundation');
            $response->assertSee('<h1', false);
            $response->assertSee('data-testid="page-heading"', false);
            $response->assertSee($heading);
            $response->assertSee('data-motion-profile="editorial"', false);
        }
    }

    public function test_every_non_home_variant_b_page_uses_an_existing_editorial_landing_image_as_its_hero(): void
    {
        $routes = [
            '/about' => 'images/variant-b/landing-1.jpg',
            '/services' => 'images/variant-b/landing-2.jpg',
            '/services/dental-implants' => 'images/variant-b/landing-2.jpg',
            '/team' => 'images/variant-b/landing-1.jpg',
            '/team/dr-tariq-bhatti' => 'images/variant-b/landing-1.jpg',
            '/team/supporting-team-member' => 'images/variant-b/landing-1.jpg',
            '/patient-journey' => 'images/variant-b/landing-3.jpg',
            '/reviews' => 'images/variant-b/landing-3.jpg',
            '/contact' => 'images/variant-b/landing-3.jpg',
            '/faq' => 'images/variant-b/landing-3.jpg',
            '/privacy' => 'images/variant-b/landing-3.jpg',
            '/terms' => 'images/variant-b/landing-3.jpg',
        ];

        foreach ($routes as $path => $heroImage) {
            $this->get($path.'?variant=b')
                ->assertSee('data-testid="variant-b-page-hero"', false)
                ->assertSee('data-testid="variant-b-page-hero-image"', false)
                ->assertSee($heroImage);
        }
    }

    public function test_about_and_patient_journey_render_editorial_pacing_and_original_assets(): void
    {
        $about = $this->get('/about?variant=b');
        $about->assertOk();
        $about->assertSee('images/variant-b/landing-1.jpg');
        $about->assertSee(config('clinic.doctor.philosophy'));
        $about->assertSee('01 / Biomimetic Preservation');
        $about->assertSee('Final practice narrative requires client approval.');
        $about->assertSee('Start Consultation Dialogue');

        $journey = $this->get('/patient-journey?variant=b');
        $journey->assertOk();
        $journey->assertSee('data-testid="variant-b-journey"', false);
        foreach (config('clinic.journey') as $step) {
            $journey->assertSee('data-testid="journey-step-'.$step['step'].'"', false);
            $journey->assertSee($step['title']);
            $journey->assertSee($step['description']);
        }
    }

    public function test_service_overview_and_detail_pages_render_data_driven_content_and_related_navigation(): void
    {
        $services = $this->get('/services?variant=b');
        $services->assertOk();

        foreach (config('site.services') as $service) {
            $services->assertSee($service['name']);
            $services->assertSee($service['introduction']);
            $services->assertSee('/services/'.$service['slug'].'?variant=b');
        }
        $services->assertSee('images/variant-b/landing-2.jpg');
        $services->assertSee('Clinical Clarity');

        $detail = $this->get('/services/dental-implants?variant=b');
        $detail->assertOk();
        $detail->assertSee('Suitability');
        $detail->assertSee('Process');
        $detail->assertSee('Benefits and considerations');
        $detail->assertSee('Technology and materials');
        $detail->assertSee('Frequently asked questions');
        $detail->assertSee('What happens first?');
        $detail->assertSee('Related services');
        $detail->assertSee('/services/restorative-care?variant=b');
        $detail->assertSee('Discuss dental implants');
        $detail->assertSee('Treatment information is educational and individual suitability must be discussed with a clinician.');
    }

    public function test_team_overview_and_detail_pages_feature_clinical_director_and_honest_placeholders(): void
    {
        $team = $this->get('/team?variant=b');
        $team->assertOk();
        $team->assertSee('Dr. Tariq Bhatti');
        $team->assertSee('Clinical Director &amp; Principal Dentist', false);
        $team->assertSee('DDS, FAGD, FICOI');
        $team->assertSee('images/variant-a/doctor-tariq-bhatti.png');
        $team->assertSee('Supporting team member');
        $team->assertSee('Profile pending client approval');
        $team->assertSee('Profile status: client approval required.');

        $doctorDetail = $this->get('/team/dr-tariq-bhatti?variant=b');
        $doctorDetail->assertOk();
        $doctorDetail->assertSee('Dr. Tariq Bhatti');
        $doctorDetail->assertSee('DDS, FAGD, FICOI');
        $doctorDetail->assertSee(config('clinic.doctor.bio'));
        $doctorDetail->assertSee('Accreditations &amp; Honors', false);
        $doctorDetail->assertSee('Fellow, Academy of General Dentistry (FAGD)');
        $doctorDetail->assertSee('Final biography and credentials require client review.');

        $placeholderDetail = $this->get('/team/supporting-team-member?variant=b');
        $placeholderDetail->assertOk();
        $placeholderDetail->assertSee('Profile status: client approval required.');
        $placeholderDetail->assertSee('Profile pending client approval');
        $placeholderDetail->assertSee('No credentials, biography, accreditation, or clinical claims have been supplied for this placeholder profile.');
    }

    public function test_reviews_page_renders_accessible_carousel_grid_and_transparent_placeholders(): void
    {
        $reviews = $this->get('/reviews?variant=b');
        $reviews->assertOk();
        $reviews->assertSee(config('site.reviews.notice'));
        $reviews->assertSee('Placeholder review — approval required');
        $reviews->assertSee('data-testimonials-carousel', false);
        $reviews->assertSee('data-testid="review-modal"', false);
        $reviews->assertDontSee('maps.google.com', false);

        foreach (config('clinic.reviews') as $review) {
            $reviews->assertSee($review['patient_name']);
            $reviews->assertSee($review['excerpt']);
        }
    }

    public function test_contact_page_renders_form_contract_and_location_schedule_map(): void
    {
        $contact = $this->get('/contact?variant=b');
        $contact->assertOk();
        $contact->assertSee('data-consultation-form', false);
        $contact->assertSee('POC only: this form validates in your browser', false);
        $contact->assertSee('450 Sutter St');
        $contact->assertSee('Open Directions in Google Maps');
        $contact->assertSee('images/variant-a/clinic-map.webp');
        $contact->assertSee('24/7 Emergency Care');
        $contact->assertSee(config('clinic.contact.phone'));
        $contact->assertSee(config('clinic.contact.whatsapp_url'));
    }

    public function test_zero_gradients_in_all_variant_b_views(): void
    {
        $views = [
            resource_path('views/variants/b/index.blade.php'),
            resource_path('views/variants/b/about.blade.php'),
            resource_path('views/variants/b/services.blade.php'),
            resource_path('views/variants/b/services-show.blade.php'),
            resource_path('views/variants/b/team.blade.php'),
            resource_path('views/variants/b/team-show.blade.php'),
            resource_path('views/variants/b/patient-journey.blade.php'),
            resource_path('views/variants/b/reviews.blade.php'),
            resource_path('views/variants/b/contact.blade.php'),
            resource_path('views/variants/b/faq.blade.php'),
            resource_path('views/variants/b/privacy.blade.php'),
            resource_path('views/variants/b/terms.blade.php'),
            resource_path('views/components/variant-b/page-header.blade.php'),
            resource_path('views/components/variant-b/cta-section.blade.php'),
        ];

        $gradientKeywords = ['linear-gradient', 'radial-gradient', 'conic-gradient', 'bg-gradient-'];

        foreach ($views as $viewPath) {
            $this->assertFileExists($viewPath);
            $content = file_get_contents($viewPath);

            foreach ($gradientKeywords as $keyword) {
                $this->assertStringNotContainsString(
                    $keyword,
                    $content,
                    "Found prohibited gradient keyword '{$keyword}' in {$viewPath}"
                );
            }
        }
    }

    public function test_interactive_elements_meet_minimum_touch_target_requirements(): void
    {
        $pages = [
            '/about?variant=b',
            '/services?variant=b',
            '/services/dental-implants?variant=b',
            '/team?variant=b',
            '/team/dr-tariq-bhatti?variant=b',
            '/patient-journey?variant=b',
            '/reviews?variant=b',
            '/contact?variant=b',
            '/faq?variant=b',
        ];

        foreach ($pages as $path) {
            $response = $this->get($path);
            $response->assertOk();
            $content = $response->getContent();
            $this->assertStringContainsString('min-h-[44px]', $content, "Missing min-h-[44px] in {$path}");
        }
    }
}
