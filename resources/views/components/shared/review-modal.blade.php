<div id="testimonials-interactive-engine" class="relative">
    <!-- Desktop Floating Popover Panel (AC-5) -->
    <div
        id="review-desktop-popover"
        class="fixed hidden opacity-0 pointer-events-none transition-opacity duration-200 motion-reduce:transition-none z-40 w-80 sm:w-96 max-w-[calc(100vw-32px)] bg-stone-warm-50 border border-stone-warm-300 rounded-2xl shadow-xl p-5 text-left"
        role="region"
        aria-label="Full Patient Review Details"
        tabindex="-1"
    >
        <div class="flex items-start justify-between gap-3 pb-3 border-b border-stone-warm-200">
            <div>
                <span id="popover-treatment" class="inline-block text-[10px] font-mono uppercase tracking-wider text-stone-warm-600"></span>
                <h4 id="popover-name" class="font-serif text-base font-semibold text-charcoal-900"></h4>
            </div>
            <div class="text-right shrink-0">
                <div id="popover-stars" class="flex items-center gap-0.5" aria-label="Review rating"></div>
                <span id="popover-date" class="text-[10px] font-mono text-stone-warm-500 block mt-0.5"></span>
            </div>
        </div>

        <div id="popover-body" class="mt-3.5 max-h-56 overflow-y-auto pr-2 text-xs sm:text-sm text-stone-warm-700 leading-relaxed font-normal">
            <!-- Full narrative content populated dynamically -->
        </div>

        <div class="mt-4 pt-3 border-t border-stone-warm-200 flex items-center justify-between">
            <a
                id="popover-source-link"
                href="https://maps.google.com"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-1.5 text-xs font-mono font-medium text-charcoal-900 hover:text-charcoal-700 underline focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
            >
                <span id="popover-source-label">Google Reviews</span>
                <svg class="w-3 h-3 text-stone-warm-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
            <span class="text-[10px] font-mono text-stone-warm-500">Verified Patient</span>
        </div>
    </div>

    <!-- Mobile / Touch Full Review Modal (AC-6) -->
    <div
        id="review-mobile-modal"
        class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-200 motion-reduce:transition-none"
        role="dialog"
        aria-modal="true"
        aria-labelledby="review-modal-name"
    >
        <!-- Backdrop Tap Target -->
        <div
            id="review-modal-backdrop"
            class="fixed inset-0 bg-charcoal-900/60 backdrop-blur-xs transition-opacity duration-200 motion-reduce:transition-none"
            aria-hidden="true"
        ></div>

        <!-- Dialog Container / Bottom Sheet -->
        <div class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 pointer-events-none">
            <div
                id="review-modal-panel"
                class="pointer-events-auto w-full sm:max-w-lg bg-stone-warm-50 border-t sm:border border-stone-warm-200 rounded-t-3xl sm:rounded-2xl shadow-2xl p-6 sm:p-8 flex flex-col max-h-[85vh] transition-transform duration-200 motion-reduce:transition-none translate-y-4 sm:translate-y-0"
            >
                <!-- Modal Header -->
                <div class="flex items-start justify-between gap-4 pb-4 border-b border-stone-warm-200">
                    <div>
                        <span id="review-modal-treatment" class="inline-block text-xs font-mono uppercase tracking-wider text-stone-warm-600"></span>
                        <h3 id="review-modal-name" class="font-serif text-xl sm:text-2xl font-bold text-charcoal-900 mt-1"></h3>
                        <div class="flex items-center gap-3 mt-1.5">
                            <div id="review-modal-stars" class="flex items-center gap-0.5"></div>
                            <span id="review-modal-date" class="text-xs font-mono text-stone-warm-500"></span>
                        </div>
                    </div>

                    <!-- Close Button (>= 44x44px touch target) -->
                    <button
                        type="button"
                        id="review-modal-close"
                        class="min-w-[44px] min-h-[44px] -mr-2 -mt-2 inline-flex items-center justify-center rounded-full text-stone-warm-600 hover:text-charcoal-900 hover:bg-stone-warm-200 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                        aria-label="Close review details"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Narrative Body (Internal Scrollable) -->
                <div id="review-modal-body" class="mt-4 flex-1 overflow-y-auto pr-1 text-sm sm:text-base text-stone-warm-700 leading-relaxed font-normal">
                    <!-- Populated dynamically -->
                </div>

                <!-- Modal Footer -->
                <div class="mt-6 pt-4 border-t border-stone-warm-200 flex items-center justify-between">
                    <a
                        id="review-modal-source-link"
                        href="https://maps.google.com"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="min-h-[44px] inline-flex items-center gap-2 text-xs font-mono font-medium text-charcoal-900 hover:text-charcoal-700 underline focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                    >
                        <span id="review-modal-source-label">Open on Google Reviews</span>
                        <svg class="w-3.5 h-3.5 text-stone-warm-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <span class="text-xs font-mono text-stone-warm-500">Verified Clinical Review</span>
                </div>
            </div>
        </div>
    </div>
</div>
