@php
    $clinic = config('clinic');
    $address = $clinic['contact']['address'];
    $hours = $clinic['hours'];
    $contact = $clinic['contact'];
    $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address['formatted']);
@endphp

<section class="py-20 sm:py-28 bg-stone-warm-50 border-t border-stone-warm-200" id="booking-location" data-testid="variant-b-booking-finale">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-stone-warm-200 pb-8 mb-12">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-3">04 / Engagement</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-light text-charcoal-900 tracking-tight">
                    Consultations &amp; Location
                </h2>
            </div>
            <p class="text-xs font-mono text-stone-warm-500 mt-4 sm:mt-0 uppercase tracking-wider">
                Historic 450 Sutter &bull; Private Suites
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
            <!-- Left Column: Location & Cartography Map (6 cols) -->
            <div class="lg:col-span-6 border border-stone-warm-300 rounded-2xl bg-stone-warm-100/30 p-6 sm:p-8">
                <!-- Address Header -->
                <div class="flex items-start justify-between pb-6 border-b border-stone-warm-200">
                    <div>
                        <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-500 block">San Francisco Suite</span>
                        <h3 class="font-serif text-2xl font-light text-charcoal-900 mt-1">
                            Clinic Location
                        </h3>
                    </div>
                    <span class="text-xs font-mono text-stone-warm-600 bg-stone-warm-200/80 px-2.5 py-1 rounded border border-stone-warm-300">
                        Union Square
                    </span>
                </div>

                <!-- Formatted Address -->
                <address class="not-italic mt-6 space-y-1 text-stone-warm-800">
                    <p class="font-serif text-lg font-normal text-charcoal-900">
                        {{ $address['line1'] }}
                    </p>
                    <p class="text-sm font-mono text-stone-warm-600">
                        {{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}
                    </p>
                </address>

                <!-- Map Container with Directions Link -->
                <div class="mt-6 rounded-xl border border-stone-warm-300 overflow-hidden relative bg-stone-warm-200/50">
                    <div class="relative aspect-[16/10] w-full">
                        <img
                            src="{{ asset('images/variant-a/clinic-map.webp') }}"
                            alt="Map of 450 Sutter St, San Francisco - Demo Location"
                            class="w-full h-full object-cover filter contrast-105"
                        />

                        <!-- Location Pin Badge -->
                        <div class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-stone-warm-50/95 border border-stone-warm-300 text-[11px] font-mono text-charcoal-900 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900"></span>
                            450 Sutter St &bull; Suite 1800
                        </div>

                        <!-- Map Attribution -->
                        <div class="absolute bottom-0 inset-x-0 bg-stone-warm-50/95 border-t border-stone-warm-200 px-3 py-1 text-[10px] text-stone-warm-600 flex items-center justify-between font-mono">
                            <span>Map data &copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener noreferrer" class="underline hover:text-charcoal-900">OpenStreetMap</a></span>
                            <span class="uppercase">POC Demo</span>
                        </div>
                    </div>
                </div>

                <!-- Directions CTA (>= 44px touch target) -->
                <div class="mt-6 pt-6 border-t border-stone-warm-200">
                    <a
                        href="{{ $mapsUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-charcoal-900 text-xs font-mono uppercase tracking-wider hover:bg-stone-warm-100 hover:border-stone-warm-400 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                    >
                        <svg class="w-3.5 h-3.5 text-stone-warm-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        <span>Open Directions in Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Operating Hours & Editorial Booking Dialogue (6 cols) -->
            <div class="lg:col-span-6 border border-stone-warm-300 rounded-2xl bg-stone-warm-100/30 p-6 sm:p-8">
                <!-- Hours Header -->
                <div class="pb-6 border-b border-stone-warm-200">
                    <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-500 block">Weekly Cadence</span>
                    <h3 class="font-serif text-2xl font-light text-charcoal-900 mt-1">
                        Operating Hours &amp; Concierge
                    </h3>
                </div>

                <!-- Schedule List -->
                <div class="mt-6">
                    <ul class="divide-y divide-stone-warm-200" role="list">
                        @foreach($hours['schedule'] as $item)
                            <li class="py-3 flex items-center justify-between text-xs sm:text-sm">
                                <span class="font-normal text-charcoal-900">{{ $item['days'] }}</span>
                                <span class="font-mono text-stone-warm-600">{{ $item['hours'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 24/7 Emergency Protocol Callout -->
                <div class="mt-6 p-4 rounded-xl border border-stone-warm-300 bg-stone-warm-50">
                    <div class="flex items-start gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-charcoal-900 shrink-0 mt-1" aria-hidden="true"></span>
                        <div>
                            <span class="text-[11px] font-mono uppercase tracking-widest text-charcoal-900 block font-medium">
                                24/7 Emergency Care Protocol
                            </span>
                            <p class="text-xs text-stone-warm-700 mt-1 font-light leading-relaxed">
                                {{ $hours['emergency'] }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Understated Consultation Dialogue CTAs (>= 44px touch targets) -->
                <div class="mt-8 pt-6 border-t border-stone-warm-200 space-y-3">
                    <a
                        href="{{ $contact['whatsapp_url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3.5 rounded-full bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900"
                    >
                        <span>Book Consultation via WhatsApp</span>
                    </a>
                    <a
                        href="tel:{{ $contact['phone_raw'] }}"
                        class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3.5 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-charcoal-900 text-xs font-mono uppercase tracking-wider hover:bg-stone-warm-100 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                    >
                        <span>Telephone Concierge: {{ $contact['phone'] }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
