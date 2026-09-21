@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="02 / Protocol"
            kicker="Calm editorial foundation"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <!-- Detailed Journey Timeline Section -->
        <x-variant-b.journey-timeline />

        <!-- Consultation CTA Section -->
        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
