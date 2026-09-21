@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="05 / Reflections"
            kicker="Calm editorial foundation"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-16">
                <!-- Prominent Placeholder Notice -->
                <div class="border-l-4 border-brass-500 bg-stone-warm-100 p-5 rounded-r-lg" data-motion="rise">
                    <p class="text-sm font-mono text-charcoal-900 leading-relaxed">
                        {{ config('site.reviews.notice') }}
                    </p>
                </div>

                <!-- Featured Testimonials Carousel -->
                <div class="border border-stone-warm-200 rounded-2xl bg-stone-warm-100/20 p-6 sm:p-10">
                    <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Featured Narratives</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 mb-8">
                        Selected Patient Perspectives
                    </h2>
                    <x-variant-b.testimonials-carousel />
                </div>

                <!-- Complete Grid of Review Records -->
                <div>
                    <div class="border-b border-stone-warm-200 pb-6 mb-8">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">All Reviews</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">
                            Archive of Patient Reflections
                        </h2>
                        <p class="mt-2 text-sm text-stone-warm-700 font-light">
                            Each review is a demonstration placeholder awaiting verified client submission and approved external destination links.
                        </p>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-motion-stagger="90">
                        @foreach(config('clinic.reviews') as $review)
                            <div class="flex flex-col">
                                <x-variant-b.review-card :review="$review" />
                                <p class="mt-2 text-center text-[10px] font-mono text-stone-warm-500 uppercase tracking-wider">
                                    Placeholder review — approval required
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Modal for Full Narratives -->
        <x-shared.review-modal />

        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
