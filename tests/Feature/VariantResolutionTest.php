<?php

namespace Tests\Feature;

use Tests\TestCase;

class VariantResolutionTest extends TestCase
{
    public function test_default_route_renders_variant_a(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-hero"', false);
        $response->assertDontSee('data-testid="variant-b-hero"', false);
        $response->assertSessionHas('variant', 'a');
    }

    public function test_query_parameter_switches_to_variant_b(): void
    {
        $response = $this->get('/?variant=b');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-hero"', false);
        $response->assertDontSee('data-testid="variant-a-hero"', false);
        $response->assertSessionHas('variant', 'b');
    }

    public function test_query_parameter_switches_to_variant_a(): void
    {
        // First set session to 'b'
        $response = $this->withSession(['variant' => 'b'])->get('/?variant=a');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-hero"', false);
        $response->assertDontSee('data-testid="variant-b-hero"', false);
        $response->assertSessionHas('variant', 'a');
    }

    public function test_invalid_variant_parameter_defaults_to_variant_a(): void
    {
        $response = $this->get('/?variant=invalid_value');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-a-hero"', false);
        $response->assertDontSee('data-testid="variant-b-hero"', false);
        $response->assertSessionHas('variant', 'a');
    }

    public function test_session_persists_across_subsequent_requests(): void
    {
        $response = $this->withSession(['variant' => 'b'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-b-hero"', false);
        $response->assertSessionHas('variant', 'b');
    }

    public function test_switcher_component_rendered_in_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('data-testid="variant-switcher"', false);
        $response->assertSee('data-testid="switcher-variant-a"', false);
        $response->assertSee('data-testid="switcher-variant-b"', false);
        $response->assertSee('Expressive 2D');
        $response->assertSee('Calm Editorial');
        $response->assertSee('Design preferences');
    }

    public function test_clinic_config_has_complete_structure(): void
    {
        $clinic = config('clinic');

        $this->assertIsArray($clinic);
        $this->assertArrayHasKey('name', $clinic);
        $this->assertArrayHasKey('tagline', $clinic);
        $this->assertArrayHasKey('contact', $clinic);
        $this->assertArrayHasKey('hours', $clinic);
        $this->assertArrayHasKey('doctor', $clinic);
        $this->assertArrayHasKey('treatments', $clinic);
        $this->assertArrayHasKey('journey', $clinic);

        $this->assertCount(4, $clinic['treatments']);
        $this->assertCount(5, $clinic['journey']);

        $this->assertEquals('Dr. Bhatti & Associates', $clinic['name']);
        $this->assertNotEmpty($clinic['contact']['whatsapp_url']);
        $this->assertNotEmpty($clinic['doctor']['name']);
    }
}
