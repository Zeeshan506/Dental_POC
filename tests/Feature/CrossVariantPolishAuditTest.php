<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CrossVariantPolishAuditTest extends TestCase
{
    /**
     * AC-1: Verify that stylesheet defines strict reduced-motion overrides.
     */
    public function test_reduced_motion_contract_is_present_in_stylesheet(): void
    {
        $css = File::get(resource_path('css/app.css'));

        $this->assertStringContainsString('@media (prefers-reduced-motion: reduce)', $css);
        $this->assertStringContainsString('animation-duration: 0.01ms !important', $css);
        $this->assertStringContainsString('transition-duration: 0.01ms !important', $css);
        $this->assertStringContainsString('transform: none !important', $css);
        $this->assertStringContainsString('[data-motion-interactive]:hover', $css);
    }

    /**
     * AC-2: Verify that color tokens in app.css satisfy WCAG 2.1 AA contrast contracts.
     */
    public function test_wcag_color_contrast_tokens_are_calibrated(): void
    {
        $css = File::get(resource_path('css/app.css'));

        $this->assertStringContainsString('--color-stone-warm-600: #806c54', $css);
        $this->assertStringContainsString('--color-stone-warm-700: #6b5740', $css);
        $this->assertStringContainsString('--color-brass-600: #8a6508', $css);
    }

    /**
     * AC-3 & AC-4: Verify Variant A markup includes accessible attributes, touch targets, and focus states.
     */
    public function test_variant_a_markup_includes_accessible_attributes_and_touch_target_classes(): void
    {
        $response = $this->get('/?variant=a');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Touch target classes (>= 44x44px)
        $this->assertStringContainsString('min-h-[44px]', $content);
        $this->assertStringContainsString('min-w-[44px]', $content);

        // Carousel controls & track focus
        $this->assertStringContainsString('data-carousel-prev', $content);
        $this->assertStringContainsString('data-carousel-next', $content);
        $this->assertStringContainsString('data-testimonials-track', $content);
        $this->assertStringContainsString('focus-visible:ring-charcoal-900', $content);

        // Review trigger & modal accessibility
        $this->assertStringContainsString('data-review-trigger', $content);
        $this->assertStringContainsString('id="review-modal"', $content);
        $this->assertStringContainsString('role="dialog"', $content);
        $this->assertStringContainsString('aria-modal="true"', $content);
        $this->assertStringContainsString('id="review-modal-close"', $content);

        // Variant switcher
        $this->assertStringContainsString('data-testid="variant-switcher"', $content);
        $this->assertStringContainsString('max-w-[calc(100vw-1.5rem)]', $content);
    }

    /**
     * AC-3 & AC-4: Verify Variant B markup includes accessible attributes, touch targets, and focus states.
     */
    public function test_variant_b_markup_includes_accessible_attributes_and_touch_target_classes(): void
    {
        $response = $this->get('/?variant=b');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Touch target classes
        $this->assertStringContainsString('min-h-[44px]', $content);
        $this->assertStringContainsString('min-w-[44px]', $content);

        // Hero gallery controls
        $this->assertStringContainsString('data-hero-gallery', $content);
        $this->assertStringContainsString('data-hero-prev', $content);
        $this->assertStringContainsString('data-hero-next', $content);

        // Carousel controls & track focus
        $this->assertStringContainsString('data-carousel-prev', $content);
        $this->assertStringContainsString('data-carousel-next', $content);
        $this->assertStringContainsString('data-testimonials-track', $content);
        $this->assertStringContainsString('focus-visible:ring-charcoal-900', $content);

        // Review trigger & modal accessibility
        $this->assertStringContainsString('data-review-trigger', $content);
        $this->assertStringContainsString('id="review-modal"', $content);

        // Footer touch targets
        $this->assertStringContainsString('min-h-[44px] py-1', $content);
    }

    /**
     * AC-1 & AC-4: Verify JavaScript files include reduced-motion guards and focus trapping.
     */
    public function test_javascript_motion_and_dialog_accessibility(): void
    {
        $appJs = File::get(resource_path('js/app.js'));
        $testimonialsJs = File::get(resource_path('js/testimonials.js'));

        // Reduced motion checks
        $this->assertStringContainsString('prefers-reduced-motion: reduce', $appJs);
        $this->assertStringContainsString('prefers-reduced-motion: reduce', $testimonialsJs);

        // Modal focus trap & Escape key
        $this->assertStringContainsString('modal.addEventListener(\'keydown\'', $testimonialsJs);
        $this->assertStringContainsString('e.key === \'Escape\'', $testimonialsJs);
        $this->assertStringContainsString('e.key !== \'Tab\'', $testimonialsJs);
        $this->assertStringContainsString('closeDelay = prefersReducedMotion ? 0 : 200', $testimonialsJs);
    }

    /**
     * AC-6: Verify all tracked text/code files adhere to 300-line modularity constraint.
     */
    public function test_modularity_check_script_passes_with_zero_violations(): void
    {
        $scriptPath = base_path('scripts/check-line-counts.mjs');
        $this->assertFileExists($scriptPath);

        $output = shell_exec('node '.escapeshellarg($scriptPath).' 2>&1');
        $this->assertStringContainsString('All', $output);
        $this->assertStringContainsString('adhere to the <= 300 line constraint', $output);
    }
}
