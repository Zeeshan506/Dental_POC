@php
    $treatments = config('clinic.treatments');
@endphp

<section id="treatments" class="py-20 sm:py-28 bg-stone-warm-50 border-b border-stone-warm-200" data-testid="variant-b-treatments">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-stone-warm-200 pb-8 mb-4">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-3">02 / Disciplines</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-light text-charcoal-900 tracking-tight">
                    Treatments &amp; Care Landscape
                </h2>
            </div>
            <p class="text-xs font-mono text-stone-warm-500 mt-4 sm:mt-0 uppercase tracking-wider">
                4 Specialized Disciplines &bull; Biomimetic Standard
            </p>
        </div>

        <!-- Restrained Hairline Rows (Editorial List Structure) -->
        <div class="divide-y divide-stone-warm-200">
            @foreach($treatments as $index => $treatment)
                <article class="group py-10 sm:py-14 transition-colors duration-200 hover:bg-stone-warm-100/30 px-2 sm:px-6 -mx-2 sm:-mx-6 rounded-2xl">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                        <!-- Column 1: Index, Title & Tagline (4 cols) -->
                        <div class="lg:col-span-4">
                            <div class="flex items-baseline gap-4 mb-2">
                                <span class="text-xs font-mono text-stone-warm-400">0{{ $index + 1 }}</span>
                                <h3 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 group-hover:text-charcoal-950 transition-colors">
                                    {{ $treatment['title'] }}
                                </h3>
                            </div>
                            <p class="text-xs font-mono uppercase tracking-wider text-stone-warm-600 pl-8">
                                {{ $treatment['tagline'] }}
                            </p>
                        </div>

                        <!-- Column 2: Clinical Description (4 cols) -->
                        <div class="lg:col-span-4">
                            <p class="text-sm sm:text-base text-stone-warm-700 font-light leading-relaxed">
                                {{ $treatment['description'] }}
                            </p>
                        </div>

                        <!-- Column 3: 4 Procedural Highlights (4 cols) -->
                        <div class="lg:col-span-4 bg-stone-warm-100/60 p-4 sm:p-5 rounded-xl border border-stone-warm-200/80">
                            <span class="text-[11px] font-mono uppercase tracking-widest text-stone-warm-600 block mb-3">
                                Procedural Highlights
                            </span>
                            <ul class="space-y-2 text-xs text-charcoal-800" role="list">
                                @foreach($treatment['highlights'] as $highlight)
                                    <li class="flex items-start gap-2.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-stone-warm-400 shrink-0 mt-1.5" aria-hidden="true"></span>
                                        <span class="font-normal">{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
