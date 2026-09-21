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
}
