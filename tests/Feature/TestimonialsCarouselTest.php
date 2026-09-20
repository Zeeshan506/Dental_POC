<?php

namespace Tests\Feature;

use App\Support\ClinicReviews;
use Tests\TestCase;

class TestimonialsCarouselTest extends TestCase
{
    public function test_clinic_reviews_config_structure(): void
    {
        $reviews = config('clinic.reviews');

        $this->assertIsArray($reviews);
        $this->assertGreaterThanOrEqual(5, count($reviews));

        foreach ($reviews as $review) {
            $this->assertArrayHasKey('id', $review);
            $this->assertArrayHasKey('patient_name', $review);
            $this->assertArrayHasKey('rating', $review);
            $this->assertArrayHasKey('excerpt', $review);
            $this->assertArrayHasKey('full_text', $review);
            $this->assertArrayHasKey('source', $review);
            $this->assertArrayHasKey('source_url', $review);
            $this->assertArrayHasKey('date', $review);
            $this->assertArrayHasKey('treatment', $review);

            $this->assertIsInt($review['rating']);
            $this->assertGreaterThanOrEqual(1, $review['rating']);
            $this->assertLessThanOrEqual(5, $review['rating']);
            $this->assertNotEmpty($review['patient_name']);
            $this->assertNotEmpty($review['excerpt']);
            $this->assertNotEmpty($review['full_text']);
        }

        $all = ClinicReviews::all();
        $this->assertCount(count($reviews), $all);

        $first = ClinicReviews::find('rev-01');
        $this->assertNotNull($first);
        $this->assertSame('rev-01', $first['id']);
        $this->assertSame('Eleanor Vance', $first['patient_name']);
    }

    public function test_variant_a_renders_testimonials_carousel(): void
    {
        $response = $this->get('/?variant=a');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-testimonials"', false);
        $response->assertSee('Patient Reassurance &amp; Stories', false);
        $response->assertSee('Quiet Confidence, Verified by Patients');
        $response->assertSee('data-carousel-prev', false);
        $response->assertSee('data-carousel-next', false);
        $response->assertSee('data-testimonials-track', false);

        $reviews = ClinicReviews::all();
        foreach ($reviews as $review) {
            $response->assertSee('data-testid="variant-a-review-card-'.$review['id'].'"', false);
            $response->assertSee($review['patient_name']);
            $response->assertSee($review['excerpt']);
            $response->assertSee($review['treatment']);
        }
    }

    public function test_variant_b_renders_testimonials_carousel(): void
    {
        $response = $this->get('/?variant=b');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-testimonials"', false);
        $response->assertSee('04 / Perspectives');
        $response->assertSee('Patient Testimonials &amp; Verified Reviews', false);
        $response->assertSee('data-carousel-prev', false);
        $response->assertSee('data-carousel-next', false);
        $response->assertSee('data-testimonials-track', false);

        $reviews = ClinicReviews::all();
        foreach ($reviews as $review) {
            $response->assertSee('data-testid="variant-b-review-card-'.$review['id'].'"', false);
            $response->assertSee($review['patient_name']);
            $response->assertSee($review['excerpt']);
            $response->assertSee($review['treatment']);
        }
    }

    public function test_carousel_cards_have_line_clamping_and_uniform_heights(): void
    {
        $responseA = $this->get('/?variant=a');
        $responseA->assertStatus(200);
        $responseA->assertSee('line-clamp-3');
        $responseA->assertSee('snap-x');
        $responseA->assertSee('snap-mandatory');

        $responseB = $this->get('/?variant=b');
        $responseB->assertStatus(200);
        $responseB->assertSee('line-clamp-3');
        $responseB->assertSee('snap-x');
        $responseB->assertSee('snap-mandatory');
    }

    public function test_desktop_and_mobile_modal_popover_elements_present(): void
    {
        foreach (['a', 'b'] as $variant) {
            $response = $this->get('/?variant='.$variant);
            $response->assertStatus(200);

            // Desktop Popover container
            $response->assertSee('id="review-desktop-popover"', false);
            $response->assertSee('id="popover-body"', false);
            $response->assertSee('id="popover-name"', false);

            // Mobile Modal container
            $response->assertSee('id="review-mobile-modal"', false);
            $response->assertSee('role="dialog"', false);
            $response->assertSee('aria-modal="true"', false);
            $response->assertSee('id="review-modal-close"', false);
            $response->assertSee('id="review-modal-backdrop"', false);
            $response->assertSee('id="review-modal-body"', false);
        }
    }

    public function test_google_reviews_links_open_in_new_tab(): void
    {
        foreach (['a', 'b'] as $variant) {
            $response = $this->get('/?variant='.$variant);
            $response->assertStatus(200);

            $response->assertSee('target="_blank"', false);
            $response->assertSee('rel="noopener noreferrer"', false);
        }
    }

    public function test_testimonials_adhere_to_modularity_and_styling_constraints(): void
    {
        $responseA = $this->get('/?variant=a');
        $contentA = $responseA->getContent();
        $this->assertStringNotContainsString('bg-gradient-', $contentA);

        $responseB = $this->get('/?variant=b');
        $contentB = $responseB->getContent();
        $this->assertStringNotContainsString('bg-gradient-', $contentB);

        // Verify touch targets >= 44px
        $responseA->assertSee('min-h-[44px]', false);
        $responseA->assertSee('min-w-[44px]', false);
        $responseB->assertSee('min-h-[44px]', false);
        $responseB->assertSee('min-w-[44px]', false);

        // Verify file sizes <= 300 lines
        $filesToCheck = [
            config_path('clinic.php'),
            app_path('Support/ClinicReviews.php'),
            resource_path('views/components/shared/star-rating.blade.php'),
            resource_path('views/components/shared/review-modal.blade.php'),
            resource_path('views/components/variant-a/testimonials-carousel.blade.php'),
            resource_path('views/components/variant-a/review-card.blade.php'),
            resource_path('views/components/variant-b/testimonials-carousel.blade.php'),
            resource_path('views/components/variant-b/review-card.blade.php'),
            resource_path('js/testimonials.js'),
            __FILE__,
        ];

        foreach ($filesToCheck as $file) {
            $this->assertFileExists($file);
            $lines = count(file($file));
            $this->assertLessThanOrEqual(300, $lines, "File {$file} exceeds 300 lines (actual: {$lines})");
        }
    }
}
