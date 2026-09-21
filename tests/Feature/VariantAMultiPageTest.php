<?php

namespace Tests\Feature;

use Tests\TestCase;

class VariantAMultiPageTest extends TestCase
{
    public function test_variant_a_renders_an_expressive_composition_for_every_public_page(): void
    {
        $pages = [
            '/about' => config('site.pages.about.heading'),
            '/services' => config('site.pages.services.heading'),
            '/services/dental-implants' => 'Dental Implants',
            '/team' => config('site.pages.team.heading'),
            '/team/dr-tariq-bhatti' => 'Dr. Tariq Bhatti',
            '/patient-journey' => config('site.pages.patient-journey.heading'),
            '/reviews' => config('site.pages.reviews.heading'),
            '/contact' => config('site.pages.contact.heading'),
            '/faq' => config('site.pages.faq.heading'),
            '/privacy' => config('site.pages.privacy.heading'),
            '/terms' => config('site.pages.terms.heading'),
        ];

        foreach ($pages as $path => $heading) {
            $response = $this->get($path.'?variant=a');

            $response
                ->assertOk()
                ->assertSee('Expressive 2D foundation · clinic field notes')
                ->assertSee('data-testid="page-heading"', false)
                ->assertSee($heading)
                ->assertSee('data-motion="headline"', false)
                ->assertSee('data-motion-interactive', false);
        }
    }

    public function test_service_detail_uses_the_reusable_informational_treatment_template(): void
    {
        $service = config('site.services.0');

        $response = $this->get('/services/'.$service['slug'].'?variant=a');

        $response
            ->assertOk()
            ->assertSee('Information, not a guarantee')
            ->assertSee('Suitability')
            ->assertSee($service['suitability'])
            ->assertSee('The consultation process')
            ->assertSee($service['process'])
            ->assertSee('Benefits and considerations')
            ->assertSee('Technology and materials')
            ->assertSee('Frequently asked questions')
            ->assertSee('Related treatments')
            ->assertSee($service['cta']['label'])
            ->assertSee('/contact?variant=a', false);
    }

    public function test_team_detail_promotes_the_clinical_director_and_labels_unapproved_profiles(): void
    {
        $director = $this->get('/team/dr-tariq-bhatti?variant=a');
        $placeholder = $this->get('/team/supporting-team-member?variant=a');

        $director
            ->assertOk()
            ->assertSee(config('clinic.doctor.name'))
            ->assertSee(config('clinic.doctor.credentials'))
            ->assertSee(config('clinic.doctor.philosophy'))
            ->assertSee('Care areas represented in this prototype')
            ->assertSee('Accreditations')
            ->assertSee('Begin a consultation dialogue');
        $placeholder
            ->assertOk()
            ->assertSee('Placeholder profile')
            ->assertSee('Profile status: client approval required.')
            ->assertSee('No portrait, credentials, biography, philosophy, care areas, or accreditations have been supplied.');
    }

    public function test_variant_a_reuses_reviews_and_keeps_contact_faq_journey_and_legal_contracts_accessible(): void
    {
        $reviews = $this->get('/reviews?variant=a');
        $contact = $this->get('/contact?variant=a');
        $faq = $this->get('/faq?variant=a');
        $journey = $this->get('/patient-journey?variant=a');
        $privacy = $this->get('/privacy?variant=a');

        $reviews
            ->assertOk()
            ->assertSee(config('site.reviews.notice'))
            ->assertSee('data-testid="variant-a-testimonials"', false)
            ->assertSee('data-carousel-prev', false)
            ->assertSee('id="review-modal"', false);
        $contact
            ->assertOk()
            ->assertSee('data-consultation-form', false)
            ->assertSee('images/variant-a/clinic-map.webp')
            ->assertSee('POC location');
        $faq->assertOk()->assertSee(config('site.faqs.0.question'));
        $journey->assertOk()->assertSee(config('clinic.journey.0.title'));
        $privacy->assertOk()->assertSee(config('site.legal.notice'));
    }

    public function test_variant_a_multi_page_components_use_only_the_existing_semantic_motion_runtime(): void
    {
        $response = $this->get('/team/dr-tariq-bhatti?variant=a');

        $response->assertOk();
        $this->assertGreaterThanOrEqual(8, substr_count($response->getContent(), 'data-motion='));
        $this->assertSame(1, substr_count((string) file_get_contents(resource_path('js/app.js')), 'new IntersectionObserver'));
        $this->assertStringNotContainsString('<script', (string) file_get_contents(resource_path('views/variants/a/page.blade.php')));
    }

    public function test_non_landing_pages_render_the_shared_responsive_layout_shell(): void
    {
        $paths = [
            '/about',
            '/services',
            '/services/dental-implants',
            '/team',
            '/team/dr-tariq-bhatti',
            '/patient-journey',
            '/reviews',
            '/contact',
            '/faq',
            '/privacy',
            '/terms',
        ];

        foreach ($paths as $path) {
            $this->get($path.'?variant=a')
                ->assertOk()
                ->assertSee('data-testid="variant-a-page-shell"', false)
                ->assertSee('px-4 py-12 sm:px-6 sm:py-16 lg:px-8 lg:py-20', false);
        }
    }

    public function test_layout_remediation_preserves_the_landing_page_and_constrains_non_landing_content(): void
    {
        $landing = $this->get('/?variant=a');
        $serviceDetail = $this->get('/services/dental-implants?variant=a');

        $landing
            ->assertOk()
            ->assertSee('data-testid="variant-a-hero"', false)
            ->assertDontSee('data-testid="variant-a-page-shell"', false);
        $serviceDetail
            ->assertOk()
            ->assertSee('overflow-x-clip', false)
            ->assertSee('max-w-3xl space-y-10', false)
            ->assertSee('lg:sticky lg:top-8', false);
    }
}
