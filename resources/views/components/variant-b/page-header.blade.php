@props([
    'chapter' => null,
    'kicker' => 'Calm editorial foundation',
    'heading' => '',
    'intro' => '',
])

<section class="border-b border-stone-warm-200 bg-stone-warm-50/80 px-4 py-16 sm:px-6 sm:py-24 lg:px-8" data-motion-profile="editorial" data-motion="fade">
    <div class="mx-auto max-w-4xl">
        <!-- Eyebrow Badge -->
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-stone-warm-300 bg-stone-warm-100 text-xs font-mono uppercase tracking-widest text-stone-warm-600 mb-6" data-motion="rise">
            <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900" aria-hidden="true"></span>
            {{ $kicker }}
        </div>

        @if($chapter)
            <div class="mb-4">
                <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-500 block mb-2" data-motion="rise">{{ $chapter }}</span>
                <div class="h-px w-16 bg-stone-warm-300" data-motion="timeline" aria-hidden="true"></div>
            </div>
        @endif

        <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-light tracking-tight text-charcoal-900 leading-[1.08]" data-testid="page-heading" data-motion="headline" data-motion-delay="80">
            {{ $heading }}
        </h1>

        @if($intro)
            <p class="mt-6 max-w-3xl text-base sm:text-xl font-light leading-relaxed text-stone-warm-700" data-motion="copy" data-motion-delay="160">
                {{ $intro }}
            </p>
        @endif
    </div>
</section>
