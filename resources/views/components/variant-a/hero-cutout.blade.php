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

            <!-- Layered 2D Cutout Composition Graphic -->
            <div class="lg:col-span-5 flex justify-center lg:justify-end animate-cutout-settle">
                <div class="relative w-full max-w-md">
                    <!-- Cutout Backplate -->
                    <div class="absolute -top-3 -left-3 w-full h-full rounded-3xl bg-stone-warm-200 border border-stone-warm-300"></div>

                    <!-- Cutout Main Surface -->
                    <div class="relative rounded-3xl bg-stone-warm-100 border border-stone-warm-300 p-8 sm:p-10">
                        <!-- Top Accent Tag -->
                        <div class="flex items-center justify-between pb-6 border-b border-stone-warm-200">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-sm bg-brass-500"></span>
                                <span class="text-xs uppercase tracking-widest text-stone-warm-700 font-semibold">Architectural Care</span>
                            </div>
                            <span class="text-xs font-mono text-stone-warm-600">{{ $clinic['contact']['address']['city'] }}, {{ $clinic['contact']['address']['state'] }}</span>
                        </div>

                        <!-- Stylized Geometric Motif (Zero Gradients) -->
                        <div class="my-8 flex items-center justify-center">
                            <div class="relative w-40 h-40 rounded-2xl bg-stone-warm-50 border-2 border-stone-warm-300 flex items-center justify-center">
                                <svg class="w-24 h-24 text-charcoal-800" viewBox="0 0 96 96" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <!-- Stylized Molar / Tooth Contour Cutout -->
                                    <path d="M48 16 C34 16 26 26 26 40 C26 56 34 80 40 80 C44 80 46 72 48 72 C50 72 52 80 56 80 C62 80 70 56 70 40 C70 26 62 16 48 16 Z" fill="#f5f2eb" />
                                    <!-- Inner Biomimetic Contour Line -->
                                    <path d="M40 32 C44 38 52 38 56 32" stroke="#aa821c" stroke-width="2" />
                                    <circle cx="48" cy="52" r="3" fill="#1a1c1e" />
                                </svg>
                                <!-- Offset Cutout Badge -->
                                <div class="absolute -bottom-3 -right-3 px-3 py-1 rounded-lg bg-stone-warm-200 border border-stone-warm-400 text-[11px] font-semibold text-charcoal-900">
                                    Biomimetic
                                </div>
                            </div>
                        </div>

                        <!-- Quote Card Inset -->
                        <div class="rounded-xl bg-stone-warm-50 p-4 border border-stone-warm-200">
                            <p class="font-serif text-sm italic text-charcoal-800 leading-snug">
                                &ldquo;Proactive prevention, patient-led dialogue, and lifelong wellness.&rdquo;
                            </p>
                            <p class="text-[11px] uppercase tracking-wider text-stone-warm-600 font-medium mt-2">
                                &mdash; {{ $clinic['doctor']['name'] }}, {{ $clinic['doctor']['credentials'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
