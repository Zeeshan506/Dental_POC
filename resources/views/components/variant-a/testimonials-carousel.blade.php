@php
    $reviews = App\Support\ClinicReviews::all();
@endphp

<section
    id="testimonials"
    class="py-16 sm:py-24 bg-stone-warm-100/60 border-b border-stone-warm-200 overflow-hidden relative"
    data-testimonials-carousel
    data-testid="variant-a-testimonials"
    aria-label="Patient Testimonials and Reviews"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header & Navigation Controls -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-stone-warm-200/80 border border-stone-warm-300 text-[11px] font-semibold uppercase tracking-wider text-stone-warm-800 mb-3" data-motion="rise">
                    <span class="w-1.5 h-1.5 rounded-full bg-brass-500"></span>
                    Patient Reassurance &amp; Stories
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal-900 tracking-tight" data-motion="headline" data-motion-delay="80">
                    Quiet Confidence, Verified by Patients
                </h2>
                <p class="mt-3 text-sm sm:text-base text-stone-warm-700 leading-relaxed" data-motion="copy" data-motion-delay="160">
                    Unfiltered perspectives on calm pacing, sensory tranquility, and restorative outcomes from our community.
                </p>
            </div>

            <!-- Restrained 2D Stone Navigation Controls (>= 44x44px touch targets) -->
            <div class="flex items-center gap-3 shrink-0" data-motion="action" data-motion-delay="220">
                <button
                    type="button"
                    data-carousel-prev
                    class="w-11 h-11 min-w-[44px] min-h-[44px] rounded-full bg-stone-warm-200 border border-stone-warm-300 hover:bg-stone-warm-300 hover:border-stone-warm-400 text-charcoal-900 flex items-center justify-center transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 active:scale-95 cursor-pointer"
                    aria-label="Previous testimonials"
                    data-motion-interactive
                >
                    <svg class="w-5 h-5 text-charcoal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button
                    type="button"
                    data-carousel-next
                    class="w-11 h-11 min-w-[44px] min-h-[44px] rounded-full bg-stone-warm-200 border border-stone-warm-300 hover:bg-stone-warm-300 hover:border-stone-warm-400 text-charcoal-900 flex items-center justify-center transition-all duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 active:scale-95 cursor-pointer"
                    aria-label="Next testimonials"
                    data-motion-interactive
                >
                    <svg class="w-5 h-5 text-charcoal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Horizontal Scrollable Carousel Container -->
        <div
            data-testimonials-track
            class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-6 pt-2 -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-charcoal-900 rounded-xl [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden"
            data-motion="group"
            data-motion-stagger="80"
            data-motion-delay="260"
            tabindex="0"
            role="region"
            aria-label="Testimonials carousel items"
        >
            @foreach($reviews as $review)
                <div class="flex-none w-[300px] sm:w-[380px] lg:w-[410px] snap-start" data-motion="review">
                    <x-variant-a.review-card :review="$review" />
                </div>
            @endforeach
        </div>
    </div>

    <!-- Interactive Popover & Mobile Modal Engine -->
    <x-shared.review-modal />
</section>
