@php
    $journey = config('clinic.journey');
    $assurances = [
        '01' => 'Unhurried dialogue in a private consultation suite with zero pressure.',
        '02' => 'Ultra-low-dose 3D cone-beam imaging and immediate diagnostic clarity.',
        '03' => 'Transparent sequencing, biomimetic material options, and clear expectations.',
        '04' => 'Acoustic tranquility, warm blankets, and modern comfort anesthesia.',
        '05' => 'Continuous preventative stewardship for enduring oral health.',
    ];
@endphp

<section id="journey" class="py-20 sm:py-28 bg-stone-warm-100/40 border-b border-stone-warm-200" data-testid="variant-b-journey">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="max-w-3xl mb-16">
            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-3">03 / Protocol</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-light text-charcoal-900 tracking-tight leading-tight">
                The Patient Journey
            </h2>
            <p class="mt-4 text-stone-warm-700 font-light text-base sm:text-lg leading-relaxed">
                Every appointment is choreographed around unhurried pacing, sensory comfort, and complete diagnostic transparency.
            </p>
        </div>

        <!-- Quiet Vertical Timeline with Hairline Connectors -->
        <div class="max-w-4xl">
            <div class="relative pl-6 sm:pl-10 border-l border-stone-warm-300 space-y-12 sm:space-y-16">
                @foreach($journey as $step)
                    <div class="relative group" data-testid="journey-step-{{ $step['step'] }}">
                        <!-- Hairline Sequence Marker Node -->
                        <div class="absolute -left-[31px] sm:-left-[47px] top-1 w-5 h-5 rounded-full bg-stone-warm-50 border-2 border-stone-warm-400 group-hover:border-charcoal-900 flex items-center justify-center transition-colors">
                            <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900"></span>
                        </div>

                        <!-- Step Content -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8 items-start">
                            <!-- Left: Step Numeral & Title (5 cols) -->
                            <div class="md:col-span-5">
                                <span class="text-xs font-mono text-stone-warm-500 uppercase tracking-widest block mb-1">
                                    Step {{ $step['step'] }}
                                </span>
                                <h3 class="font-serif text-xl sm:text-2xl font-light text-charcoal-900 leading-snug">
                                    {{ $step['title'] }}
                                </h3>
                            </div>

                            <!-- Right: Description & Assurance Callout (7 cols) -->
                            <div class="md:col-span-7 space-y-3">
                                <p class="text-sm sm:text-base text-stone-warm-700 font-light leading-relaxed">
                                    {{ $step['description'] }}
                                </p>

                                @if(isset($assurances[$step['step']]))
                                    <div class="inline-flex items-center gap-2 pt-1">
                                        <span class="w-1 h-1 rounded-full bg-stone-warm-400"></span>
                                        <span class="text-xs font-mono text-stone-warm-600 italic">
                                            {{ $assurances[$step['step']] }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Architectural Assurance Callout Block -->
            <div class="mt-16 p-6 sm:p-8 rounded-2xl border border-stone-warm-300 bg-stone-warm-50">
                <blockquote class="font-serif text-lg sm:text-xl font-light italic text-charcoal-900 leading-relaxed border-l-2 border-stone-warm-400 pl-6">
                    &ldquo;We deliberately pace appointments to ensure you never feel rushed, your questions are fully answered, and every procedure is executed with calm precision.&rdquo;
                </blockquote>
                <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 mt-4 pl-6 block">
                    &mdash; Clinical Protocol Assurance &bull; Dr. Bhatti &amp; Associates
                </span>
            </div>
        </div>
    </div>
</section>
