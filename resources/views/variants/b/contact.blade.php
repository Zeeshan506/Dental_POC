@extends('layouts.app')

@php
    $clinic = config('clinic');
    $address = $clinic['contact']['address'];
    $hours = $clinic['hours'];
    $contact = $clinic['contact'];
    $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address['formatted']);
@endphp

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="04 / Inquiries"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    <!-- Left: Consultation Form (Shared Contract) -->
                    <div class="lg:col-span-7 bg-stone-warm-100/30 border border-stone-warm-200 rounded-2xl p-6 sm:p-10" data-motion="group">
                        <div class="border-b border-stone-warm-200 pb-6 mb-8">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2" data-motion="rise">Private Consultation</span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900" data-motion="headline" data-motion-delay="80">
                                Send a Consultation Inquiry
                            </h2>
                            <p class="mt-2 text-sm text-stone-warm-700 font-light" data-motion="copy" data-motion-delay="160">
                                Share your care preferences and our clinical concierge will connect with you to arrange a suitable appointment.
                            </p>
                        </div>

                        <x-shared.consultation-form />
                    </div>

                    <!-- Right: Location, Map & Schedule -->
                    <div class="lg:col-span-5 space-y-8" data-motion="group" data-motion-delay="160">
                        <!-- Location & Cartography -->
                        <div class="border border-stone-warm-200 rounded-2xl bg-stone-warm-100/30 p-6 sm:p-8" data-motion="card">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-1" data-motion="rise">San Francisco</span>
                            <h3 class="font-serif text-2xl font-light text-charcoal-900" data-motion="headline" data-motion-delay="80">
                                Clinic Location
                            </h3>

                            <address class="not-italic mt-4 space-y-1 text-stone-warm-800 text-sm">
                                <p class="font-serif text-base font-normal text-charcoal-900">{{ $address['line1'] }}</p>
                                <p class="font-mono text-stone-warm-600">{{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}</p>
                            </address>

                            <div class="mt-6 rounded-xl border border-stone-warm-200 overflow-hidden relative bg-stone-warm-200/50" data-motion="image">
                                <div class="relative aspect-[16/10] w-full">
                                    <img
                                        src="{{ asset('images/variant-a/clinic-map.webp') }}"
                                        alt="Map of 450 Sutter St, San Francisco"
                                        class="w-full h-full object-cover filter contrast-105"
                                    />
                                    <div class="absolute bottom-0 inset-x-0 bg-stone-warm-50/95 border-t border-stone-warm-200 px-3 py-1 text-[10px] text-stone-warm-600 flex items-center justify-between font-mono">
                                        <span>Map &copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener noreferrer" class="underline hover:text-charcoal-900 inline-block py-2.5 -my-2.5">OpenStreetMap</a></span>
                                        <span>450 Sutter St</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-stone-warm-200">
                                <a
                                    href="{{ $mapsUrl }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-charcoal-900 text-xs font-mono uppercase tracking-wider hover:bg-stone-warm-100 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    data-motion-interactive
                                >
                                    <span>Open Directions in Google Maps</span>
                                </a>
                            </div>
                        </div>

                        <!-- Schedule & Concierge -->
                        <div class="border border-stone-warm-200 rounded-2xl bg-stone-warm-100/30 p-6 sm:p-8" data-motion="card" data-motion-delay="80">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-1" data-motion="rise">Weekly Schedule</span>
                            <h3 class="font-serif text-2xl font-light text-charcoal-900" data-motion="headline" data-motion-delay="80">
                                Operating Hours
                            </h3>

                            <ul class="mt-6 divide-y divide-stone-warm-200" role="list">
                                @foreach($hours['schedule'] as $item)
                                    <li class="py-3 flex items-center justify-between text-xs sm:text-sm">
                                        <span class="font-normal text-charcoal-900">{{ $item['days'] }}</span>
                                        <span class="font-mono text-stone-warm-600">{{ $item['hours'] }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-6 p-4 rounded-xl border border-stone-warm-200 bg-stone-warm-50 text-xs text-stone-warm-700 font-light leading-relaxed">
                                <span class="font-mono font-medium uppercase tracking-wider text-charcoal-900 block mb-1">24/7 Emergency Care</span>
                                {{ $hours['emergency'] }}
                            </div>

                            <div class="mt-6 pt-6 border-t border-stone-warm-200 space-y-3">
                                <a
                                    href="{{ $contact['whatsapp_url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center w-full min-h-[44px] px-6 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    data-motion-interactive
                                >
                                    WhatsApp Concierge
                                </a>
                                <a
                                    href="tel:{{ $contact['phone_raw'] }}"
                                    class="inline-flex items-center justify-center w-full min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-charcoal-900 text-xs font-mono uppercase tracking-wider hover:bg-stone-warm-100 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    data-motion-interactive
                                >
                                    Telephone: {{ $contact['phone'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
