@props([
    'treatment' => [],
])

@php
    $title = $treatment['title'] ?? '';
    $tagline = $treatment['tagline'] ?? '';
    $description = $treatment['description'] ?? '';
    $highlights = $treatment['highlights'] ?? [];
    $id = $treatment['id'] ?? '';

    // Map treatment family to photographic cutout object
    $cutoutMap = [
        'preventative' => [
            'src' => asset('images/variant-a/dental-tools.webp'),
            'alt' => 'Dental examination mirror and diagnostic tools',
            'label' => 'Diagnostic',
        ],
        'cosmetic' => [
            'src' => asset('images/variant-a/smile.webp'),
            'alt' => 'Natural smile showing translucent enamel',
            'label' => 'Aesthetic',
        ],
        'restorative' => [
            'src' => asset('images/variant-a/implant.webp'),
            'alt' => 'Precision titanium dental implant and crown model',
            'label' => 'Biomimetic',
        ],
        'pediatric' => [
            'src' => asset('images/variant-a/child-toothbrush.webp'),
            'alt' => 'Child gentle silicone toothbrush',
            'label' => 'Gentle Care',
        ],
    ];

    $cutout = $cutoutMap[$id] ?? $cutoutMap['preventative'];
@endphp

<article class="group relative flex flex-col justify-between rounded-2xl bg-stone-warm-100/90 border border-stone-warm-200 p-6 sm:p-7 hover:border-stone-warm-400 hover:-translate-y-1 hover:bg-stone-warm-100 transition-all duration-200 focus-within:ring-2 focus-within:ring-charcoal-900 pt-10" data-testid="treatment-tile-{{ $id }}">
    <!-- Small Editorial Cutout partially breaking card boundary (Top Right) -->
    <div class="absolute -top-7 right-5 z-20 w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-stone-warm-50 border border-stone-warm-300 p-1.5 shadow-none group-hover:scale-105 group-hover:border-stone-warm-400 transition-all duration-200 overflow-hidden">
        <img src="{{ $cutout['src'] }}" alt="{{ $cutout['alt'] }}" class="w-full h-full object-contain filter" />
    </div>

    <!-- Card Header -->
    <div>
        <!-- Category Tag -->
        <div class="flex items-center gap-2 mb-4">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-stone-warm-200/80 border border-stone-warm-300 text-[11px] font-semibold uppercase tracking-wider text-stone-warm-800">
                <span class="w-1.5 h-1.5 rounded-full bg-brass-500"></span>
                {{ $cutout['label'] }}
            </span>
        </div>

        <!-- Title & Tagline -->
        <h3 class="font-serif text-xl sm:text-2xl font-bold text-charcoal-900 group-hover:text-charcoal-950 transition-colors">
            {{ $title }}
        </h3>
        <p class="text-xs sm:text-sm font-medium text-stone-warm-700 mt-2 leading-snug">
            {{ $tagline }}
        </p>

        <!-- Description -->
        <p class="text-xs sm:text-sm text-stone-warm-600 mt-4 leading-relaxed">
            {{ $description }}
        </p>
    </div>

    <!-- Highlights Section -->
    <div class="mt-6 pt-5 border-t border-stone-warm-200/90">
        <span class="text-[11px] font-semibold uppercase tracking-wider text-charcoal-900 block mb-3">
            Highlighted Procedures
        </span>
        <ul class="space-y-2.5" role="list">
            @foreach($highlights as $highlight)
                <li class="flex items-start gap-2.5 text-xs text-stone-warm-800">
                    <span class="w-4 h-4 rounded-full bg-stone-warm-200 border border-stone-warm-300 flex items-center justify-center shrink-0 mt-0.5" aria-hidden="true">
                        <svg class="w-2.5 h-2.5 text-charcoal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </span>
                    <span class="font-medium">{{ $highlight }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</article>
