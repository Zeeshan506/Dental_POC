@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 overflow-x-clip bg-stone-warm-50 pb-12 sm:pb-20">
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
            <x-variant-a.page-shell class="pb-6 sm:pb-8" data-motion="copy">
                <p class="max-w-4xl border-l-4 border-brass-500 bg-stone-warm-100 p-5 text-sm leading-relaxed text-charcoal-900">{{ config('site.reviews.notice') }}</p>
            </x-variant-a.page-shell>
            <x-variant-a.testimonials-carousel />
        @else
            <x-variant-a.information-page :page="$page" :variant="$variant" />
        @endif
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
