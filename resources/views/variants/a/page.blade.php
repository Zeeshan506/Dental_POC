@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 overflow-hidden bg-stone-warm-50 pb-16 sm:pb-24">
        <x-variant-a.page-intro :page="$page" />

        @if($page['key'] === 'about')
            <x-variant-a.about-page :page="$page" :variant="$variant" />
        @elseif($page['key'] === 'services')
            <x-variant-a.services-page :services="$page['resources']" :variant="$variant" />
        @elseif($page['key'] === 'services.show')
            <x-variant-a.service-detail :service="$page['resource']" :variant="$variant" />
        @elseif($page['key'] === 'team')
            <x-variant-a.team-page :members="$page['resources']" :variant="$variant" />
        @elseif($page['key'] === 'team.show')
            <x-variant-a.team-detail :member="$page['resource']" :variant="$variant" />
        @elseif($page['key'] === 'reviews')
            <section class="px-4 pb-6 pt-10 sm:px-6 lg:px-8" data-motion="copy">
                <p class="mx-auto max-w-7xl border-l-4 border-brass-500 bg-stone-warm-100 p-5 text-sm leading-relaxed text-charcoal-900">{{ config('site.reviews.notice') }}</p>
            </section>
            <x-variant-a.testimonials-carousel />
        @else
            <x-variant-a.information-page :page="$page" :variant="$variant" />
        @endif
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
