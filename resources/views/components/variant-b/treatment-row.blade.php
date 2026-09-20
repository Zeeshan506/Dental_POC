@php
    $treatments = config('clinic.treatments');
@endphp

<section id="treatments" class="py-24 sm:py-32 bg-stone-warm-50 border-b border-stone-warm-200" data-testid="variant-b-treatments">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="border-b border-stone-warm-200 pb-8 mb-4">
            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-500 block mb-3">02 / Disciplines</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-light text-charcoal-900 tracking-tight">
                Treatments &amp; Care Landscape
            </h2>
        </div>

        <!-- Restrained Hairline Rows (Editorial List Structure) -->
        <div class="divide-y divide-stone-warm-200">
            @foreach($treatments as $index => $treatment)
                <article class="group py-12 sm:py-16 transition-colors duration-300 hover:bg-stone-warm-100/30 px-3 sm:px-6 -mx-3 sm:-mx-6 rounded-xl">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                        <!-- Column 1: Index, Title & Tagline (4 cols) -->
                        <div class="lg:col-span-4">
                            <div class="flex items-baseline gap-4 mb-2">
                                <span class="text-xs font-mono text-stone-warm-400">0{{ $index + 1 }}</span>
                                <h3 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 group-hover:text-charcoal-950 transition-colors">
                                    {{ $treatment['title'] }}
                                </h3>
                            </div>
                            <p class="text-xs font-mono uppercase tracking-wider text-stone-warm-500 pl-8">
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
                        <div class="lg:col-span-4 space-y-3">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-500 block">
                                Clinical Procedures
                            </span>
                            <ul class="space-y-2 text-xs text-stone-warm-800 font-light" role="list">
                                @foreach($treatment['highlights'] as $highlight)
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-1 h-1 rounded-full bg-stone-warm-400 shrink-0" aria-hidden="true"></span>
                                        <span>{{ $highlight }}</span>
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
