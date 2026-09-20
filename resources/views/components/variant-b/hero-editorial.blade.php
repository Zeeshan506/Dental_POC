@php
    $clinic = config('clinic');
@endphp

<section class="relative py-20 sm:py-28 lg:py-36 bg-stone-warm-50 border-b border-stone-warm-200 overflow-hidden" data-testid="variant-b-hero">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left Narrative Column -->
            <div class="lg:col-span-7 animate-editorial-settle">
                <!-- Eyebrow Badge -->
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full border border-stone-warm-300 bg-stone-warm-100/60 text-xs font-medium uppercase tracking-widest text-stone-warm-800 mb-8">
                    <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900" aria-hidden="true"></span>
                    Variant B &bull; Calm Editorial Direction
                </div>

                <!-- Display Headline -->
                <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-light tracking-tight text-charcoal-900 leading-[1.08]">
                    Restorative, invisible, and <span class="italic font-normal">utterly calm</span>.
                </h1>

                <!-- Clinical Value Proposition -->
                <p class="mt-8 text-lg sm:text-xl text-stone-warm-700 font-light leading-relaxed max-w-2xl">
                    {{ $clinic['description'] }}
                </p>

                <!-- Consultation & Exploration CTAs -->
                <div class="mt-10 flex flex-wrap items-center gap-5">
                    <a href="{{ $clinic['contact']['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-8 py-3.5 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-medium hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900">
                        Begin Consultation Dialogue
                    </a>
                    <a href="#treatments" class="inline-flex items-center justify-center min-h-[44px] px-4 py-3.5 text-sm font-medium text-charcoal-800 hover:text-charcoal-950 transition-colors underline underline-offset-8 decoration-stone-warm-400 hover:decoration-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                        View Clinical Disciplines &rarr;
                    </a>
                </div>

                <!-- Editorial Meta Marks -->
                <div class="mt-12 pt-8 border-t border-stone-warm-200 grid grid-cols-3 gap-6 max-w-xl">
                    <div>
                        <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-500 block">Corridor</span>
                        <span class="text-sm font-medium text-charcoal-900 mt-1 block">450 Sutter St</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-500 block">Chambers</span>
                        <span class="text-sm font-medium text-charcoal-900 mt-1 block">Suite 1800</span>
                    </div>
                    <div>
                        <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-500 block">Aesthetic</span>
                        <span class="text-sm font-medium text-charcoal-900 mt-1 block">Biomimetic</span>
                    </div>
                </div>
            </div>

            <!-- Right Architectural Framing Column -->
            <div class="lg:col-span-5 animate-editorial-settle">
                <div class="relative border border-stone-warm-300/80 bg-stone-warm-100/40 p-4 sm:p-5 rounded-2xl">
                    <!-- Architectural Frame Header -->
                    <div class="flex items-center justify-between pb-3 mb-3 border-b border-stone-warm-200/80">
                        <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-600">Architectural Cadence</span>
                        <span class="text-[11px] font-mono text-stone-warm-500">San Francisco</span>
                    </div>

                    <!-- Framing Container with Hairline Rules and Architectural Geometry -->
                    <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-stone-warm-100 border border-stone-warm-200 flex flex-col justify-between p-6">
                        <!-- Subtle Architectural Line Art -->
                        <svg class="absolute inset-0 w-full h-full text-stone-warm-300/40 stroke-current pointer-events-none" viewBox="0 0 400 500" fill="none" aria-hidden="true">
                            <rect x="30" y="30" width="340" height="440" stroke-width="0.75" />
                            <rect x="50" y="50" width="300" height="400" stroke-width="0.5" stroke-dasharray="2 2" />
                            <line x1="30" y1="250" x2="370" y2="250" stroke-width="0.5" stroke-dasharray="4 4" />
                            <line x1="200" y1="30" x2="200" y2="470" stroke-width="0.5" stroke-dasharray="4 4" />
                            <circle cx="200" cy="250" r="80" stroke-width="0.75" />
                            <circle cx="200" cy="250" r="130" stroke-width="0.5" stroke-dasharray="3 3" />
                        </svg>

                        <!-- Frame Top Annotation -->
                        <div class="relative z-10">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-stone-warm-600 bg-stone-warm-200/90 px-2.5 py-1 rounded border border-stone-warm-300">
                                Fig. 00 &bull; Spatial Discipline
                            </span>
                        </div>

                        <!-- Frame Center Typographic Statement -->
                        <div class="relative z-10 my-auto text-center px-4">
                            <p class="font-serif text-2xl sm:text-3xl font-light italic text-charcoal-900 leading-snug">
                                &ldquo;Quiet light, unhurried time, and clinical restraint.&rdquo;
                            </p>
                            <p class="text-xs uppercase tracking-widest text-stone-warm-600 mt-4 font-mono">
                                Dental Design Studio San Francisco
                            </p>
                        </div>

                        <!-- Frame Bottom Coordinates -->
                        <div class="relative z-10 flex items-center justify-between text-[10px] font-mono text-stone-warm-600 pt-3 border-t border-stone-warm-200">
                            <span>Lat 37.7897&deg; N</span>
                            <span>Long 122.4089&deg; W</span>
                        </div>
                    </div>

                    <!-- Subtle Frame Caption -->
                    <p class="text-xs text-stone-warm-600 font-light mt-3 text-center">
                        Union Square Medical Landmark &bull; Designed for acoustic serenity
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
