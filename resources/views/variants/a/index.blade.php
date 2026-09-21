@extends('layouts.app')

@section('title', 'Variant A: Expressive 2D Cutout | ' . config('clinic.name'))

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1">
        <!-- Chapter 1: 2D Cutout Hero Composition (AC-1) -->
        <x-variant-a.hero-cutout />

        <!-- Chapter 2: Clinical Leadership & Philosophy Section (AC-2) -->
        <x-variant-a.doctor-card />

        <!-- Chapter 3: Treatments & Care Landscape Section (AC-3) -->
        <section id="treatments" class="py-16 sm:py-24 bg-stone-warm-50 border-b border-stone-warm-200" data-testid="variant-a-treatments">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2" data-motion="rise">
                        Comprehensive Care
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal-900 tracking-tight" data-motion="headline" data-motion-delay="80">
                        Treatments &amp; Care Landscape
                    </h2>
                    <p class="mt-4 text-sm sm:text-base text-stone-warm-700 leading-relaxed" data-motion="copy" data-motion-delay="160">
                        Precision restorative, preventative, cosmetic, and pediatric dentistry delivered with biomimetic materials and unhurried clinical care.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-motion-stagger="90" data-motion-delay="220">
                    @foreach(config('clinic.treatments') as $treatment)
                        <x-variant-a.treatment-tile :treatment="$treatment" :index="$loop->iteration" />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Chapter 4: The Patient Journey & Stories Section (AC-4) -->
        <section id="journey" class="py-16 sm:py-24 bg-stone-warm-100/40 border-b border-stone-warm-200" data-testid="variant-a-journey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mb-16">
                    <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2" data-motion="rise">
                        The Patient Journey
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal-900 tracking-tight" data-motion="headline" data-motion-delay="80">
                        Unhurried, Predictable Care Across Every Step
                    </h2>
                    <p class="mt-4 text-sm sm:text-base text-stone-warm-700 leading-relaxed" data-motion="copy" data-motion-delay="160">
                        Every appointment is designed around calm pacing, clear communication, and total sensory comfort.
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-4 items-start" data-motion-stagger="90" data-motion-delay="220">
                    @foreach(config('clinic.journey') as $step)
                        <x-variant-a.journey-step
                            :step="$step['step']"
                            :title="$step['title']"
                            :description="$step['description']"
                            :is-last="$loop->last"
                        />
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials & Patient Reviews Carousel (Phase 3) -->
        <x-variant-a.testimonials-carousel />

        <!-- Chapter 5: Location, Hours & Booking Finale (AC-5) -->
        <x-variant-a.booking-finale />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
