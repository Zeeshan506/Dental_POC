@props([
    'step' => '',
    'title' => '',
    'description' => '',
    'isLast' => false,
])

@php
    $waypointMap = [
        '01' => [
            'src' => asset('images/variant-a/dentist-cutout.webp'),
            'alt' => 'Dr. Bhatti Consultation Dialogue',
            'tag' => 'Zero-Pressure Dialogue',
        ],
        '02' => [
            'src' => asset('images/variant-a/dental-xray.webp'),
            'alt' => 'Digital 3D Cone Beam Scan',
            'tag' => 'Ultra-Low Dose Imaging',
        ],
        '03' => [
            'src' => asset('images/variant-a/tooth-model.webp'),
            'alt' => 'Biomimetic Formulation Model',
            'tag' => 'Transparent Sequencing',
        ],
        '04' => [
            'src' => asset('images/variant-a/dental-tools.webp'),
            'alt' => 'Precision Dental Instruments',
            'tag' => 'Acoustic & Thermal Comfort',
        ],
        '05' => [
            'src' => asset('images/variant-a/smile.webp'),
            'alt' => 'Radiant Natural Smiling Patient',
            'tag' => 'Longitudinal Wellness',
        ],
    ];

    $waypoint = $waypointMap[$step] ?? null;
@endphp

<div class="relative flex flex-col items-start group" data-testid="journey-step-{{ $step }}">
    <!-- Connective Progression Line (Desktop Horizontal, Mobile Vertical) -->
    @unless($isLast)
        <div class="hidden lg:block absolute top-6 left-12 w-[calc(100%-2rem)] h-[2px] bg-stone-warm-300" aria-hidden="true"></div>
        <div class="lg:hidden absolute top-12 left-5 w-[2px] h-[calc(100%-1.5rem)] bg-stone-warm-300" aria-hidden="true"></div>
    @endunless

    <!-- Sequence Header with Badge & Waypoint Photographic Cutout -->
    <div class="flex items-center gap-3 z-10 mb-4">
        <!-- Numbered Sequence Badge (2D Cutout Stone) -->
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-stone-warm-100 border-2 border-stone-warm-300 flex items-center justify-center font-serif text-base sm:text-lg font-bold text-charcoal-900 group-hover:border-stone-warm-400 group-hover:bg-stone-warm-50 transition-colors shrink-0">
            {{ $step }}
        </div>

        <!-- Waypoint Supporting Cutout (Small Editorial Waypoint) -->
        @if($waypoint)
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-stone-warm-50 border border-stone-warm-300 p-1 overflow-hidden shrink-0">
                <img src="{{ $waypoint['src'] }}" alt="{{ $waypoint['alt'] }}" class="w-full h-full object-contain filter" />
            </div>
        @endif

        <span class="lg:hidden text-xs font-semibold uppercase tracking-wider text-stone-warm-600">
            Step {{ $step }}
        </span>
    </div>

    <!-- Step Content Card -->
    <div class="w-full pl-14 lg:pl-0 pt-1 lg:pt-3">
        <h3 class="font-serif text-lg sm:text-xl font-semibold text-charcoal-900 leading-snug">
            {{ $title }}
        </h3>
        <p class="mt-2 text-xs sm:text-sm text-stone-warm-700 leading-relaxed max-w-sm">
            {{ $description }}
        </p>

        <!-- Trust Indicator Tag -->
        @if($waypoint)
            <div class="mt-3">
                <span class="inline-block text-[11px] font-medium text-stone-warm-700 bg-stone-warm-200/80 border border-stone-warm-300 px-2 py-0.5 rounded">
                    {{ $waypoint['tag'] }}
                </span>
            </div>
        @endif
    </div>
</div>
