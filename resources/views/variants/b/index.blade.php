@extends('layouts.app')

@section('title', 'Variant B: Calm Editorial | ' . config('clinic.name'))

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1">
        <!-- Variant B Hero Chapter (Calm Editorial Scaffolding) -->
        <section class="py-20 sm:py-32 bg-stone-warm-50 border-b border-stone-warm-200" data-testid="variant-b-hero">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-stone-warm-300 text-xs font-medium uppercase tracking-widest text-stone-warm-700 mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-charcoal-900"></span>
                        Variant B &bull; Calm Editorial Direction
                    </div>
                    <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-light tracking-tight text-charcoal-900 leading-[1.1]">
                        Restorative, invisible, and <span class="italic font-normal">utterly calm</span>.
                    </h1>
                    <p class="mt-8 text-lg sm:text-xl text-stone-warm-700 font-light leading-relaxed max-w-2xl">
                        {{ $clinic['description'] }}
                    </p>
                    <div class="mt-10 flex flex-wrap items-center gap-6">
                        <a href="{{ $clinic['contact']['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-7 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-medium hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900">
                            Begin Consultation Dialogue
                        </a>
                        <a href="#treatments" class="inline-flex items-center justify-center min-h-[44px] text-sm font-medium text-charcoal-800 hover:text-charcoal-900 transition-colors underline underline-offset-4 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                            View Clinical Disciplines &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clinical Director Editorial Scaffolding -->
        <section class="py-20 bg-stone-warm-100/40 border-b border-stone-warm-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-baseline">
                    <div class="lg:col-span-4">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-3">01 / Ethos</span>
                        <h2 class="font-serif text-3xl font-light text-charcoal-900">{{ $clinic['doctor']['name'] }}</h2>
                        <p class="text-xs uppercase tracking-wider text-stone-warm-600 mt-1">{{ $clinic['doctor']['title'] }}</p>
                        <p class="text-xs font-medium text-stone-warm-700 mt-0.5">{{ $clinic['doctor']['credentials'] }}</p>
                    </div>
                    <div class="lg:col-span-8 space-y-6">
                        <blockquote class="font-serif text-2xl font-light text-charcoal-900 leading-snug border-l border-stone-warm-400 pl-6">
                            &ldquo;{{ $clinic['doctor']['philosophy'] }}&rdquo;
                        </blockquote>
                        <p class="text-sm text-stone-warm-700 leading-relaxed font-light pl-6">
                            {{ $clinic['doctor']['bio'] }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Treatments Editorial Scaffolding -->
        <section id="treatments" class="py-20 bg-stone-warm-50 border-b border-stone-warm-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-baseline justify-between border-b border-stone-warm-200 pb-6 mb-8">
                    <div>
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-1">02 / Disciplines</span>
                        <h2 class="font-serif text-3xl font-light text-charcoal-900">Treatments & Care Landscape</h2>
                    </div>
                    <span class="text-xs text-stone-warm-600 mt-2 sm:mt-0">4 Distinct Focus Areas</span>
                </div>
                <div class="divide-y divide-stone-warm-200">
                    @foreach($clinic['treatments'] as $treatment)
                        <div class="py-8 grid grid-cols-1 md:grid-cols-12 gap-6 items-baseline">
                            <div class="md:col-span-4">
                                <h3 class="font-serif text-xl font-medium text-charcoal-900">{{ $treatment['title'] }}</h3>
                                <p class="text-xs text-stone-warm-600 mt-1">{{ $treatment['tagline'] }}</p>
                            </div>
                            <div class="md:col-span-8">
                                <p class="text-sm text-stone-warm-700 font-light leading-relaxed">{{ $treatment['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <x-shared.footer-shell />
@endsection
