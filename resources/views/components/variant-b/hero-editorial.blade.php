@php
    $clinic = config('clinic');
@endphp

<section class="relative py-28 sm:py-36 lg:py-44 bg-stone-warm-50 border-b border-stone-warm-200 overflow-hidden" data-testid="variant-b-hero">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-editorial-settle">
        <!-- Eyebrow Badge -->
        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full border border-stone-warm-300/80 bg-stone-warm-100/60 text-xs font-mono uppercase tracking-widest text-stone-warm-700 mb-10">
            <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900" aria-hidden="true"></span>
            Variant B &bull; Calm Editorial Direction
        </div>

        <!-- Single Strong Display Headline -->
        <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl xl:text-8xl font-light tracking-tight text-charcoal-900 leading-[1.08] max-w-4xl mx-auto">
            Restorative, invisible, and <span class="italic font-normal">utterly calm</span>.
        </h1>

        <!-- Restrained Supporting Copy -->
        <p class="mt-8 sm:mt-10 text-lg sm:text-xl lg:text-2xl text-stone-warm-700 font-light leading-relaxed max-w-2xl mx-auto">
            {{ $clinic['description'] }}
        </p>

        <!-- Unaggressive, Clearly Visible CTAs (Min 44px Touch Targets) -->
        <div class="mt-12 sm:mt-14 flex flex-wrap items-center justify-center gap-5">
            <a
                href="{{ $clinic['contact']['whatsapp_url'] }}"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center min-h-[44px] px-8 py-3.5 rounded-full bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900"
            >
                Begin Consultation Dialogue
            </a>
            <a
                href="#treatments"
                class="inline-flex items-center justify-center min-h-[44px] px-6 py-3.5 text-xs font-mono uppercase tracking-wider text-charcoal-800 hover:text-charcoal-950 transition-colors duration-200 underline underline-offset-8 decoration-stone-warm-300 hover:decoration-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
            >
                View Clinical Disciplines &rarr;
            </a>
        </div>
    </div>
</section>
