@extends('layouts.app')

@section('title', 'Variant A: Expressive 2D Cutout | ' . config('clinic.name'))

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1">
        <!-- Variant A Hero Chapter (Expressive 2D Cutout Scaffolding) -->
        <section class="py-16 sm:py-24 bg-stone-warm-50 border-b border-stone-warm-200" data-testid="variant-a-hero">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-warm-200/80 border border-stone-warm-300 text-xs font-semibold uppercase tracking-wider text-stone-warm-800 mb-6">
                        <span class="w-2 h-2 rounded-full bg-brass-500"></span>
                        Variant A &bull; Expressive 2D Cutout Direction
                    </div>
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-charcoal-900 leading-[1.15]">
                        Calm, architectural dentistry crafted for lifelong wellness.
                    </h1>
                    <p class="mt-6 text-lg sm:text-xl text-stone-warm-700 leading-relaxed">
                        {{ $clinic['description'] }}
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="{{ $clinic['contact']['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-6 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-semibold hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900">
                            Book Initial Consultation
                        </a>
                        <a href="#treatments" class="inline-flex items-center justify-center min-h-[44px] px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-100 text-charcoal-800 text-sm font-semibold hover:bg-stone-warm-200 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                            Explore Treatments
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clinical Director & Philosophy Scaffolding -->
        <section class="py-16 bg-stone-warm-100/50 border-b border-stone-warm-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-5">
                        <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2">Clinical Leadership</span>
                        <h2 class="font-serif text-3xl font-bold text-charcoal-900">{{ $clinic['doctor']['name'] }}</h2>
                        <p class="text-sm font-medium text-stone-warm-700 mt-1">{{ $clinic['doctor']['title'] }} &bull; {{ $clinic['doctor']['credentials'] }}</p>
                    </div>
                    <div class="lg:col-span-7 space-y-4">
                        <blockquote class="font-serif text-lg italic text-charcoal-800 border-l-2 border-brass-500 pl-4 py-1">
                            &ldquo;{{ $clinic['doctor']['philosophy'] }}&rdquo;
                        </blockquote>
                        <p class="text-sm text-stone-warm-700 leading-relaxed">
                            {{ $clinic['doctor']['bio'] }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Treatments Chapter Scaffolding -->
        <section id="treatments" class="py-16 bg-stone-warm-50 border-b border-stone-warm-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600 block mb-2">Comprehensive Care</span>
                    <h2 class="font-serif text-3xl font-bold text-charcoal-900">Treatments & Care Landscape</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($clinic['treatments'] as $treatment)
                        <div class="p-6 rounded-2xl bg-stone-warm-100/80 border border-stone-warm-200 hover:border-stone-warm-300 transition-colors">
                            <h3 class="font-serif text-lg font-semibold text-charcoal-900">{{ $treatment['title'] }}</h3>
                            <p class="text-xs text-stone-warm-600 font-medium mt-1">{{ $treatment['tagline'] }}</p>
                            <p class="text-xs text-stone-warm-700 mt-3 leading-relaxed">{{ $treatment['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <x-shared.footer-shell />
@endsection
