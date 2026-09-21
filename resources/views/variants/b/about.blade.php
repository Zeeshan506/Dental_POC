@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="01 / Practice"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <!-- Section 1: Asymmetric Editorial Narrative & Photography -->
        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    <!-- Left: Photographic Pairing -->
                    <div class="lg:col-span-5 space-y-6" data-motion="image">
                        <div class="border border-stone-warm-200 bg-stone-warm-100/30 p-3 sm:p-4 rounded-2xl">
                            <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-stone-warm-200/60 border border-stone-warm-200">
                                <img
                                    src="{{ asset('images/variant-b/landing-1.jpg') }}"
                                    alt="Overhead architectural perspective of private treatment suite"
                                    class="w-full h-full object-cover filter grayscale contrast-105"
                                />
                                <div class="absolute bottom-3 left-3 right-3 bg-stone-warm-50/95 border border-stone-warm-200 rounded-lg p-3">
                                    <p class="font-serif text-xs font-medium text-charcoal-900">450 Sutter St, Suite 1800</p>
                                    <p class="text-[10px] text-stone-warm-600 font-mono mt-0.5">San Francisco &bull; Established Clinical Suite</p>
                                </div>
                            </div>
                        </div>

                        <!-- Subtle Metadata Box -->
                        <div class="border border-stone-warm-200 rounded-xl p-5 bg-stone-warm-100/20" data-motion="card">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Practice Standard</span>
                            <p class="text-xs text-stone-warm-700 leading-relaxed font-light">
                                Appointments are strictly limited in frequency to guarantee dedicated clinician attention, diagnostic clarity, and zero clinical rushing.
                            </p>
                        </div>
                    </div>

                    <!-- Right: Long-form Editorial Story -->
                    <div class="lg:col-span-7 space-y-8">
                        <div>
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-3" data-motion="rise">Philosophy &amp; Ethos</span>
                            <div class="h-px w-16 bg-stone-warm-300 mb-4" data-motion="timeline" aria-hidden="true"></div>
                            <h2 class="font-serif text-3xl sm:text-4xl font-light text-charcoal-900 tracking-tight leading-tight" data-motion="headline" data-motion-delay="80">
                                Restorative quiet meets uncompromising diagnostic precision.
                            </h2>
                        </div>

                        <blockquote class="font-serif text-xl sm:text-2xl font-light italic text-charcoal-900 leading-snug border-l border-stone-warm-300 pl-6 py-1 my-6" data-motion="copy" data-motion-delay="160">
                            &ldquo;{{ config('clinic.doctor.philosophy') }}&rdquo;
                        </blockquote>

                        <div class="space-y-4 text-stone-warm-700 font-light leading-relaxed text-base sm:text-lg" data-motion="copy" data-motion-delay="220">
                            <p>
                                Founded on the principle that dental visits should feel restorative rather than clinical, Dr. Bhatti &amp; Associates combines two decades of clinical distinction with an architectural sanctuary in downtown San Francisco.
                            </p>
                            <p>
                                We reject high-volume, hurried scheduling in favor of deliberate, unhurried consultations. Every treatment plan is co-created with the patient, respecting personal aesthetic desires, physiological tooth preservation, and long-term oral-systemic health.
                            </p>
                        </div>

                        <!-- 3 Pillars with Hairline Dividers -->
                        <div class="pt-8 border-t border-stone-warm-200" data-motion="group" data-motion-delay="280">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-4">
                                Clinical Commitments
                            </span>

                            <div class="divide-y divide-stone-warm-200 border-y border-stone-warm-200" data-motion-stagger="90">
                                <div class="py-4 flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 text-sm" data-motion="card">
                                    <span class="font-serif text-base text-charcoal-900">01 / Biomimetic Preservation</span>
                                    <span class="text-xs text-stone-warm-600 font-mono">Conserving natural enamel &amp; tooth structure</span>
                                </div>
                                <div class="py-4 flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 text-sm" data-motion="card">
                                    <span class="font-serif text-base text-charcoal-900">02 / Low-Dose 3D Diagnostics</span>
                                    <span class="text-xs text-stone-warm-600 font-mono">Ultra-low radiation cone beam imaging</span>
                                </div>
                                <div class="py-4 flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 text-sm" data-motion="card">
                                    <span class="font-serif text-base text-charcoal-900">03 / Sensory Acclimation</span>
                                    <span class="text-xs text-stone-warm-600 font-mono">Tranquil acoustic setting &amp; comfort anesthesia</span>
                                </div>
                            </div>
                        </div>

                        <!-- Client Approval Notice -->
                        <div class="p-4 rounded-xl border border-stone-warm-200 bg-stone-warm-100/30 text-xs text-stone-warm-600 font-mono" data-motion="rise">
                            Practice narrative note: This proof-of-concept page presents the clinic information supplied for review. Final practice narrative requires client approval.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
