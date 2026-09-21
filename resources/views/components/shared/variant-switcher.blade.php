@props(['activeVariant' => 'a'])
@php
    $currentVariant = in_array(strtolower($activeVariant), ['a', 'b'], true) ? strtolower($activeVariant) : 'a';
    $urlVariantA = request()->fullUrlWithQuery(['variant' => 'a']);
    $urlVariantB = request()->fullUrlWithQuery(['variant' => 'b']);
@endphp
<div
    class="fixed bottom-3 right-3 z-50 max-w-[calc(100vw-1rem)] transition-transform duration-200 motion-reduce:transition-none sm:bottom-6 sm:left-1/2 sm:right-auto sm:-translate-x-1/2"
    role="region"
    aria-label="Design Variant Switcher"
    data-testid="variant-switcher"
    data-motion="rise"
    data-motion-delay="180"
>
    <nav class="flex items-center gap-1 rounded-2xl border border-charcoal-700 bg-charcoal-900 p-1.5 shadow-2xl" aria-label="Variant Navigation">
        <!-- Variant A Pill -->
        <a
            href="{{ $urlVariantA }}"
            @class([
                'inline-flex h-11 w-11 items-center justify-center rounded-xl text-xs font-semibold transition-colors motion-reduce:transition-none focus:outline-none focus-visible:ring-2 focus-visible:ring-stone-warm-200 sm:w-auto sm:px-4',
                'bg-stone-warm-50 text-charcoal-900 font-semibold shadow-sm' => $currentVariant === 'a',
                'text-stone-warm-300 hover:text-stone-warm-50 hover:bg-charcoal-800' => $currentVariant !== 'a',
            ])
            aria-current="{{ $currentVariant === 'a' ? 'page' : 'false' }}"
            aria-label="Switch to Variant A: Expressive 2D"
            data-testid="switcher-variant-a"
            data-motion-interactive
        >
            <span class="hidden h-2 w-2 rounded-full sm:inline-block sm:mr-2 {{ $currentVariant === 'a' ? 'bg-brass-500' : 'bg-charcoal-700' }}" aria-hidden="true"></span>
            <span class="sm:hidden" aria-hidden="true">A</span>
            <span class="hidden sm:inline">Variant A: Expressive 2D</span>
        </a>

        <!-- Variant B Pill -->
        <a
            href="{{ $urlVariantB }}"
            @class([
                'inline-flex h-11 w-11 items-center justify-center rounded-xl text-xs font-semibold transition-colors motion-reduce:transition-none focus:outline-none focus-visible:ring-2 focus-visible:ring-stone-warm-200 sm:w-auto sm:px-4',
                'bg-stone-warm-50 text-charcoal-900 font-semibold shadow-sm' => $currentVariant === 'b',
                'text-stone-warm-300 hover:text-stone-warm-50 hover:bg-charcoal-800' => $currentVariant !== 'b',
            ])
            aria-current="{{ $currentVariant === 'b' ? 'page' : 'false' }}"
            aria-label="Switch to Variant B: Calm Editorial"
            data-testid="switcher-variant-b"
            data-motion-interactive
        >
            <span class="hidden h-2 w-2 rounded-full sm:inline-block sm:mr-2 {{ $currentVariant === 'b' ? 'bg-brass-500' : 'bg-charcoal-700' }}" aria-hidden="true"></span>
            <span class="sm:hidden" aria-hidden="true">B</span>
            <span class="hidden sm:inline">Variant B: Calm Editorial</span>
        </a>
    </nav>
</div>
