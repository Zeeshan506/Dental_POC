@php
    $doctor = config('clinic.doctor');
@endphp
<section class="py-16 sm:py-24 bg-stone-warm-100/60 border-b border-stone-warm-200" id="philosophy" data-testid="variant-a-doctor">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="mb-12">
            <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2">
                Clinical Leadership &amp; Philosophy
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal-900 tracking-tight">
                Architectural Precision, Unhurried Empathy
            </h2>
        </div>

        <!-- Layered 2D Stone Card Composition -->
        <div class="relative">
            <!-- Background Layered Cutout Backplate -->
            <div class="hidden sm:block absolute -top-4 -left-4 w-full h-full rounded-3xl bg-stone-warm-200/90 border border-stone-warm-300" aria-hidden="true"></div>

            <!-- Foreground Main Card -->
            <div class="relative rounded-3xl bg-stone-warm-50 border border-stone-warm-300 p-8 sm:p-12 lg:p-14">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                    <!-- Doctor Identity Column -->
                    <div class="lg:col-span-5 space-y-6">
                        <!-- Portrait / Silhouette Cutout Placeholder -->
                        <div class="relative w-full max-w-sm mx-auto lg:mx-0 aspect-[4/5] rounded-2xl bg-stone-warm-200 border-2 border-stone-warm-300 overflow-hidden flex flex-col justify-end p-6">
                            <!-- Geometric Cutout Pattern in Background -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-25 pointer-events-none">
                                <svg class="w-48 h-48 text-stone-warm-600" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="50" cy="50" r="40" stroke-dasharray="4 4" />
                                    <rect x="25" y="25" width="50" height="50" />
                                    <line x1="50" y1="10" x2="50" y2="90" />
                                </svg>
                            </div>

                            <!-- Doctor Tag Badge -->
                            <div class="relative z-10 rounded-xl bg-stone-warm-50/95 border border-stone-warm-300 p-4">
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-brass-600 block">
                                    {{ $doctor['title'] }}
                                </span>
                                <h3 class="font-serif text-xl sm:text-2xl font-bold text-charcoal-900 mt-0.5">
                                    {{ $doctor['name'] }}
                                </h3>
                                <p class="text-xs font-medium text-stone-warm-700 mt-1">
                                    {{ $doctor['credentials'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Doctor Micro Bio Details -->
                        <div class="rounded-xl bg-stone-warm-100 p-4 border border-stone-warm-200">
                            <span class="text-xs font-semibold uppercase tracking-wider text-stone-warm-800 block mb-1">
                                Clinical Distinction
                            </span>
                            <p class="text-xs text-stone-warm-700 leading-relaxed">
                                20+ years of conservative, tooth-preserving restorative dentistry with advanced fellowships in general dentistry and oral implantology.
                            </p>
                        </div>
                    </div>

                    <!-- Philosophy & Accreditations Column -->
                    <div class="lg:col-span-7 space-y-8">
                        <!-- Philosophy Quote with Warm Accent Border -->
                        <div class="border-l-4 border-brass-500 pl-6 py-2 bg-stone-warm-100/50 rounded-r-2xl border-y border-r border-stone-warm-200">
                            <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2">
                                The Clinical Ethos
                            </span>
                            <blockquote class="font-serif text-lg sm:text-xl italic text-charcoal-900 leading-relaxed">
                                &ldquo;{{ $doctor['philosophy'] }}&rdquo;
                            </blockquote>
                        </div>

                        <!-- Biographical Narrative -->
                        <div class="space-y-4 text-stone-warm-800 text-sm sm:text-base leading-relaxed">
                            <p>
                                {{ $doctor['bio'] }}
                            </p>
                            <p class="text-xs sm:text-sm text-stone-warm-700">
                                Dedicated to minimizing treatment invasiveness through biomimetic restorations and precision diagnostics, Dr. Bhatti ensures every patient receives an individualized plan rooted in long-term physiology.
                            </p>
                        </div>

                        <!-- Clinical Accreditation Badges (AC-2) -->
                        <div class="pt-6 border-t border-stone-warm-200">
                            <span class="text-xs font-semibold uppercase tracking-widest text-charcoal-900 block mb-4">
                                Board Honors &amp; Accreditations
                            </span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($doctor['accreditations'] as $accreditation)
                                    <div class="flex items-start gap-3 p-3.5 rounded-xl bg-stone-warm-100 border border-stone-warm-200/90 hover:border-stone-warm-300 transition-colors">
                                        <div class="w-5 h-5 rounded-md bg-stone-warm-200 border border-stone-warm-300 flex items-center justify-center shrink-0 mt-0.5">
                                            <svg class="w-3.5 h-3.5 text-brass-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-medium text-charcoal-800 leading-tight">
                                            {{ $accreditation }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
