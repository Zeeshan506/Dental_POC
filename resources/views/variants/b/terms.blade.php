@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="Legal &bull; Terms"
            kicker="Calm editorial foundation"
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
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">01 / Informational Nature of Content</h2>
                        <p>
                            All clinical materials, treatment summaries, and educational narratives published on this website are provided solely for consultation dialogue and general understanding. They do not constitute formal medical diagnosis, individualized clinical advice, or guaranteed treatment outcomes.
                        </p>
                    </section>

                    <section class="border-b border-stone-warm-200 pb-8" data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">02 / Clinical Consultations Required</h2>
                        <p>
                            Every patient possesses unique anatomical, physiological, and aesthetic requirements. Definitive treatment recommendations and care plans are established only following an in-person diagnostic examination by Dr. Bhatti or an authorized clinical colleague.
                        </p>
                    </section>

                    <section class="border-b border-stone-warm-200 pb-8" data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">03 / Consultation Dialogue Prototype</h2>
                        <p>
                            The consultation inquiry interface provided on this website is a demonstration prototype designed to explore digital intake workflows. Submitting inquiries through this form does not confirm an appointment or establish a formal doctor-patient relationship.
                        </p>
                    </section>

                    <section data-motion="copy">
                        <h2 class="font-serif text-2xl text-charcoal-900 mb-3">04 / Practice Concierge Inquiries</h2>
                        <p>
                            For inquiries regarding practice terms, please contact our administrative concierge at
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
