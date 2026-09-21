@props(['activeVariant' => 'a'])
@php
    $currentVariant = in_array(strtolower($activeVariant), ['a', 'b'], true) ? strtolower($activeVariant) : 'a';
    $urlVariantA = request()->fullUrlWithQuery(['variant' => 'a']);
    $urlVariantB = request()->fullUrlWithQuery(['variant' => 'b']);
@endphp
<div
    class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 transition-transform duration-200 motion-reduce:transition-none max-w-[calc(100vw-1rem)]"
    role="region"
    aria-label="Design Variant Switcher"
    data-testid="variant-switcher"
    data-motion="rise"
    data-motion-delay="180"
>
    <nav class="flex items-center gap-1 p-1.5 bg-charcoal-900 border border-charcoal-700 rounded-full shadow-2xl" aria-label="Variant Navigation">
        <!-- Variant A Pill -->
        <a
            href="{{ $urlVariantA }}"
            @class([
                'inline-flex items-center justify-center min-h-[44px] px-3 sm:px-4 py-2 rounded-full text-xs font-medium transition-colors motion-reduce:transition-none focus:outline-none focus-visible:ring-2 focus-visible:ring-stone-warm-200',
                'bg-stone-warm-50 text-charcoal-900 font-semibold shadow-sm' => $currentVariant === 'a',
                'text-stone-warm-300 hover:text-stone-warm-50 hover:bg-charcoal-800' => $currentVariant !== 'a',
            ])
            aria-current="{{ $currentVariant === 'a' ? 'page' : 'false' }}"
            data-testid="switcher-variant-a"
            data-motion-interactive
        >
            <span class="inline-block w-2 h-2 rounded-full mr-1.5 sm:mr-2 {{ $currentVariant === 'a' ? 'bg-brass-500' : 'bg-charcoal-700' }}" aria-hidden="true"></span>
            <span>Variant A: Expressive 2D</span>
        </a>

        <!-- Variant B Pill -->
        <a
            href="{{ $urlVariantB }}"
            @class([
                'inline-flex items-center justify-center min-h-[44px] px-3 sm:px-4 py-2 rounded-full text-xs font-medium transition-colors motion-reduce:transition-none focus:outline-none focus-visible:ring-2 focus-visible:ring-stone-warm-200',
                'bg-stone-warm-50 text-charcoal-900 font-semibold shadow-sm' => $currentVariant === 'b',
                'text-stone-warm-300 hover:text-stone-warm-50 hover:bg-charcoal-800' => $currentVariant !== 'b',
            ])
            aria-current="{{ $currentVariant === 'b' ? 'page' : 'false' }}"
            data-testid="switcher-variant-b"
            data-motion-interactive
        >
            <span class="inline-block w-2 h-2 rounded-full mr-1.5 sm:mr-2 {{ $currentVariant === 'b' ? 'bg-brass-500' : 'bg-charcoal-700' }}" aria-hidden="true"></span>
            <span>Variant B: Calm Editorial</span>
        </a>
    </nav>
</div>
