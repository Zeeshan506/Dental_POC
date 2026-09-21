@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="Legal &bull; Privacy"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-4xl space-y-10">
                <!-- Legal Notice Box -->
                <div class="border-l-4 border-brass-500 bg-stone-warm-100 p-6 rounded-r-lg" data-motion="rise">
                    <p class="text-sm font-mono text-charcoal-900 leading-relaxed">
                        {{ config('site.legal.notice') }}
                    </p>
                </div>

                <article class="space-y-8 text-stone-warm-700 font-light leading-relaxed text-base sm:text-lg">
                    <section class="border-b border-stone-warm-200 pb-8" data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">01 / Overview &amp; Data Governance</h2>
                        <p>
                            Dr. Bhatti &amp; Associates is committed to protecting the privacy, confidentiality, and security of all personal and medical information shared through our practice communication channels.
                        </p>
                    </section>

                    <section class="border-b border-stone-warm-200 pb-8" data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">02 / Information Collected During Consultations</h2>
                        <p>
                            When you initiate contact or complete our consultation inquiry prototype, information provided is held in strict clinical confidence. We collect only what is necessary to understand your care preferences and schedule appropriate diagnostic appointments.
                        </p>
                    </section>

                    <section class="border-b border-stone-warm-200 pb-8" data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">03 / Clinical Records &amp; Medical Privacy</h2>
                        <p>
                            Diagnostic imagery, treatment notes, and health histories are managed in compliance with applicable healthcare privacy standards (HIPAA and state health regulations). Records are never disclosed without express patient authorization.
                        </p>
                    </section>

                    <section data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">04 / Concierge Inquiries</h2>
                        <p>
                            For inquiries regarding your personal information, please contact our concierge team directly at
                            <a href="mailto:{{ config('clinic.contact.email') }}" class="underline hover:text-charcoal-900">{{ config('clinic.contact.email') }}</a>
                            or call
                            <a href="tel:{{ config('clinic.contact.phone_raw') }}" class="underline hover:text-charcoal-900">{{ config('clinic.contact.phone') }}</a>.
                        </p>
                    </section>
                </article>
            </div>
        </section>
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
