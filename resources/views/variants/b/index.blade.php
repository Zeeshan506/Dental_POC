@extends('layouts.app')

@section('title', 'Variant B: Calm Editorial | ' . config('clinic.name'))

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1">
        <!-- Chapter 1: Architectural Editorial Hero Composition (AC-1) -->
        <x-variant-b.hero-editorial />

        <!-- Chapter 2: Clinical Director & Ethos Section (AC-2) -->
        <x-variant-b.doctor-portrait />

        <!-- Chapter 3: Treatments & Care Landscape Section (AC-3) -->
        <x-variant-b.treatment-row />

        <!-- Chapter 4: The Patient Journey & Stories Section (AC-4) -->
        <x-variant-b.journey-timeline />

        <!-- Chapter 5: Patient Testimonials & Reviews Carousel (Phase 3) -->
        <x-variant-b.testimonials-carousel />

        <!-- Chapter 6: Clinic Location, Hours & Editorial Booking Finale (AC-5) -->
        <x-variant-b.booking-finale />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
