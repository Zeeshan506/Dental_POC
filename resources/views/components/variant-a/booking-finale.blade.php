@php
    $clinic = config('clinic');
    $address = $clinic['contact']['address'];
    $hours = $clinic['hours'];
    $contact = $clinic['contact'];
    $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address['formatted']);
@endphp

<section class="py-16 sm:py-24 bg-stone-warm-100/50 border-t border-stone-warm-200" id="booking-location" data-testid="variant-a-booking-finale">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2" data-motion="rise">
                Location &amp; Consultations
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal-900 tracking-tight" data-motion="headline" data-motion-delay="80">
                Visit the Clinic &bull; Begin Your Dialogue
            </h2>
            <p class="mt-4 text-sm sm:text-base text-stone-warm-700 leading-relaxed" data-motion="copy" data-motion-delay="160">
                Located in the historic Sutter Street medical corridor of San Francisco. Designed with private consultation suites and acoustic tranquility.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
            <!-- Location & Real Map Card (2D Cutout Layered Surface) -->
            <div class="lg:col-span-6 flex flex-col justify-between rounded-3xl bg-stone-warm-50 border border-stone-warm-300 p-8 sm:p-10" data-motion="card" data-motion-delay="220">
                <div>
                    <!-- Address Header -->
                    <div class="flex items-start justify-between gap-4 pb-6 border-b border-stone-warm-200">
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-wider text-brass-600 block">
                                San Francisco Suite
                            </span>
                            <h3 class="font-serif text-2xl font-bold text-charcoal-900 mt-1">
                                Clinic Location
                            </h3>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-stone-warm-200 border border-stone-warm-300 text-xs font-mono text-charcoal-800">
                            Union Square
                        </span>
                    </div>

                    <!-- Formatted Address -->
                    <address class="not-italic mt-6 space-y-2 text-stone-warm-800">
                        <p class="text-lg font-medium text-charcoal-900">
                            {{ $address['line1'] }}
                        </p>
                        <p class="text-sm text-stone-warm-700">
                            {{ $address['city'] }}, {{ $address['state'] }} {{ $address['postal_code'] }}
                        </p>
                    </address>

                    <!-- Real Cartography Map Container with OpenStreetMap Attribution -->
                    <div class="mt-6 rounded-2xl bg-stone-warm-200/70 border border-stone-warm-300 overflow-hidden relative shadow-none" data-motion="mask" data-motion-delay="320">
                        <div class="relative aspect-[16/10] w-full">
                            <img src="{{ asset('images/variant-a/clinic-map.webp') }}" alt="Map of 450 Sutter St, San Francisco - Demo Location" class="w-full h-full object-cover" />

                            <!-- Demo Location Badge Overlay -->
                            <div class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-stone-warm-50/95 border border-stone-warm-300 text-[11px] font-semibold text-charcoal-900 flex items-center gap-1.5 shadow-none">
                                <span class="w-2 h-2 rounded-full bg-brass-500"></span>
                                Demo Location &bull; 450 Sutter St
                            </div>

                            <!-- OpenStreetMap Attribution Footer -->
                            <div class="absolute bottom-0 inset-x-0 bg-stone-warm-50/95 border-t border-stone-warm-200 px-3 py-1 text-[10px] text-stone-warm-700 flex items-center justify-between">
                                <span>Map data &copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener noreferrer" class="underline hover:text-charcoal-900">OpenStreetMap</a> contributors</span>
                                <span class="font-mono text-[9px] uppercase">POC Demo</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Directions Link (Min 44px Touch Target) -->
                <div class="mt-8 pt-6 border-t border-stone-warm-200">
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3 rounded-xl border border-stone-warm-300 bg-stone-warm-100 text-charcoal-900 text-sm font-semibold hover:bg-stone-warm-200 hover:border-stone-warm-400 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900" data-motion-interactive>
                        <svg class="w-4 h-4 text-charcoal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        <span>Open Directions in Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- Hours & Direct Booking Card -->
            <div class="lg:col-span-6 flex flex-col justify-between rounded-3xl bg-stone-warm-50 border border-stone-warm-300 p-8 sm:p-10" data-motion="card" data-motion-delay="300">
                <div>
                    <!-- Hours Header -->
                    <div class="pb-6 border-b border-stone-warm-200">
                        <span class="text-xs font-semibold uppercase tracking-wider text-brass-600 block">
                            Operating Schedule
                        </span>
                        <h3 class="font-serif text-2xl font-bold text-charcoal-900 mt-1">
                            Clinic Hours &amp; Emergency Care
                        </h3>
                    </div>

                    <!-- Weekly Hours Table -->
                    <div class="mt-6">
                        <ul class="space-y-3" role="list" data-motion-stagger="60" data-motion-delay="380">
                            @foreach($hours['schedule'] as $item)
                                <li class="flex items-center justify-between py-2 border-b border-stone-warm-200/80 text-sm" data-motion="rise">
                                    <span class="font-medium text-charcoal-900">{{ $item['days'] }}</span>
                                    <span class="font-mono text-xs text-stone-warm-700 bg-stone-warm-100 px-2.5 py-1 rounded border border-stone-warm-200">
                                        {{ $item['hours'] }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- 24/7 Emergency Protocol Callout -->
                    <div class="mt-6 rounded-2xl bg-stone-warm-100/90 border border-stone-warm-300 p-4 sm:p-5" data-motion="rise" data-motion-delay="500">
                        <div class="flex items-start gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-brass-500 shrink-0 mt-1.5 ring-2 ring-stone-warm-300"></span>
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider text-charcoal-900">
                                    24/7 Emergency Protocol
                                </h4>
                                <p class="text-xs text-stone-warm-700 mt-1 leading-relaxed">
                                    {{ $hours['emergency'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Contact CTAs (Min 44px Touch Targets) -->
                <div class="mt-8 pt-6 border-t border-stone-warm-200 space-y-3">
                    <a href="{{ $contact['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-semibold hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900" data-motion="action" data-motion-delay="560" data-motion-interactive>
                        <span>Book Consultation via WhatsApp</span>
                    </a>
                    <a href="tel:{{ $contact['phone_raw'] }}" class="inline-flex items-center justify-center gap-2 w-full min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-100 text-charcoal-900 text-sm font-semibold hover:bg-stone-warm-200 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900" data-motion-interactive>
                        <span>Telephone Concierge: {{ $contact['phone'] }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
