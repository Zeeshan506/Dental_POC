@php
    $clinic = config('clinic');
@endphp
<section class="relative overflow-hidden bg-stone-warm-50 border-b border-stone-warm-200 py-16 sm:py-24 lg:py-28" data-testid="variant-a-hero">
    <!-- 2D Cutout Background Plane Geometry (Zero Gradients) -->
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -top-12 right-0 w-96 h-96 rounded-3xl bg-stone-warm-100/60 border border-stone-warm-200/70 rotate-6 translate-x-1/4"></div>
        <div class="absolute top-1/2 -right-16 w-80 h-80 rounded-full bg-stone-warm-200/40 border border-stone-warm-300/60 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-1/3 w-64 h-32 rounded-t-3xl bg-stone-warm-100/40 border-t border-x border-stone-warm-200/50"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <!-- Hero Content Column -->
            <div class="lg:col-span-7 animate-cutout-settle">
                <!-- Eyebrow Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-stone-warm-200/90 border border-stone-warm-300 text-xs font-semibold uppercase tracking-wider text-stone-warm-900 mb-6">
                    <span class="w-2 h-2 rounded-full bg-brass-500 ring-2 ring-stone-warm-300"></span>
                    Variant A &bull; Expressive 2D Cutout
                </div>

                <!-- Headline -->
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-charcoal-900 leading-[1.12]">
                    Calm, architectural dentistry crafted for lifelong wellness.
                </h1>

                <!-- Clinical Value Proposition -->
                <p class="mt-6 text-lg sm:text-xl text-stone-warm-700 leading-relaxed max-w-2xl font-normal">
                    {{ $clinic['description'] }}
                </p>

                <!-- Call To Actions -->
                <div class="mt-8 sm:mt-10 flex flex-wrap items-center gap-4">
                    <a href="{{ $clinic['contact']['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-7 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-semibold hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900">
                        Book Initial Consultation
                    </a>
                    <a href="#treatments" class="inline-flex items-center justify-center min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-100 text-charcoal-800 text-sm font-semibold hover:bg-stone-warm-200 hover:border-stone-warm-400 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                        Explore Treatments
                    </a>
                </div>

                <!-- Key Metrics & Trust Callouts -->
                <div class="mt-10 pt-8 border-t border-stone-warm-200/80 grid grid-cols-3 gap-4 max-w-lg">
                    <div>
                        <span class="block font-serif text-2xl font-bold text-charcoal-900">20+</span>
                        <span class="block text-xs uppercase tracking-wider text-stone-warm-600 mt-0.5">Years Clinical Excellence</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl font-bold text-charcoal-900">100%</span>
                        <span class="block text-xs uppercase tracking-wider text-stone-warm-600 mt-0.5">Digital 3D Diagnostics</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl font-bold text-charcoal-900">24/7</span>
                        <span class="block text-xs uppercase tracking-wider text-stone-warm-600 mt-0.5">Emergency Concierge</span>
                    </div>
                </div>
            </div>

            <!-- Layered 2D Cutout Composition with Real Photographic Cutouts -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end animate-cutout-settle">
                <div class="relative w-full max-w-md">
                    <!-- Layer 1: Warm Stone Cutout Backplate -->
                    <div class="absolute -top-4 -left-4 w-full h-[95%] rounded-3xl bg-stone-warm-200 border border-stone-warm-300 rotate-1"></div>

                    <!-- Layer 2: Supporting Secondary Cutout (Tooth Model, partially off-canvas top right) -->
                    <div class="absolute -top-10 -right-6 z-10 w-28 h-28 sm:w-32 sm:h-32 rounded-2xl bg-stone-warm-100/90 border border-stone-warm-300 p-2 rotate-6">
                        <img src="{{ asset('images/variant-a/tooth-model.webp') }}" alt="Biomimetic Tooth Model" class="w-full h-full object-contain filter" />
                        <span class="absolute -bottom-2 -left-2 text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 rounded bg-stone-warm-200 border border-stone-warm-400 text-charcoal-900">
                            Biomimetic
                        </span>
                    </div>

                    <!-- Layer 3: Supporting Secondary Cutout (Dental Tools, bottom left) -->
                    <div class="absolute -bottom-6 -left-8 z-10 w-32 h-32 sm:w-36 sm:h-36 rounded-2xl bg-stone-warm-100/90 border border-stone-warm-300 p-2 -rotate-6">
                        <img src="{{ asset('images/variant-a/dental-tools.webp') }}" alt="Precision Dental Mirror & Instruments" class="w-full h-full object-contain filter" />
                        <span class="absolute -top-2 -right-2 text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 rounded bg-stone-warm-200 border border-stone-warm-400 text-charcoal-900">
                            Precision
                        </span>
                    </div>

                    <!-- Layer 4: Main Cutout Container (Cream Architectural Surface) -->
                    <div class="relative rounded-3xl bg-stone-warm-100 border border-stone-warm-300 pt-6 px-6 sm:px-8 pb-0 overflow-hidden flex flex-col items-center">
                        <!-- Top Accent Tag -->
                        <div class="w-full flex items-center justify-between pb-4 border-b border-stone-warm-200 z-10">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-sm bg-brass-500"></span>
                                <span class="text-xs uppercase tracking-widest text-stone-warm-800 font-semibold">Clinical Director</span>
                            </div>
                            <span class="text-xs font-mono text-stone-warm-600">{{ $clinic['contact']['address']['city'] }}, {{ $clinic['contact']['address']['state'] }}</span>
                        </div>

                        <!-- Full-Height Cutout of Confident Dentist with Arms Crossed (Paper Cutout Effect) -->
                        <div class="relative z-20 w-full flex justify-center mt-2">
                            <img src="{{ asset('images/variant-a/dentist-cutout.webp') }}" alt="Dr. Tariq Bhatti standing with arms crossed" class="w-auto h-80 sm:h-96 object-contain filter drop-shadow-[0_8px_16px_rgba(0,0,0,0.06)]" />
                        </div>

                        <!-- Overlapping Floating Identity Badge -->
                        <div class="absolute bottom-4 left-4 right-4 z-30 rounded-xl bg-stone-warm-50/95 border border-stone-warm-300 p-3 shadow-none">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-serif text-sm font-bold text-charcoal-900">
                                        {{ $clinic['doctor']['name'] }}
                                    </p>
                                    <p class="text-[11px] font-medium text-stone-warm-700">
                                        {{ $clinic['doctor']['title'] }} &bull; {{ $clinic['doctor']['credentials'] }}
                                    </p>
                                </div>
                                <span class="w-2 h-2 rounded-full bg-brass-500"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
