@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="03 / Clarifications"
            :heading="$page['heading']"
            :intro="$page['intro']"
            hero-image="images/variant-b/landing-3.jpg"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-4xl space-y-8">
                <!-- Informational Notice -->
                <div class="border-l-4 border-brass-500 bg-stone-warm-100 p-5 rounded-r-lg" data-motion="rise">
                    <p class="text-sm font-mono text-charcoal-900 leading-relaxed">
                        Notice: These answers are informational and require clinical confirmation for an individual patient.
                    </p>
                </div>

                <!-- Editorial Accordion Group -->
                <div class="divide-y divide-stone-warm-200 border-y border-stone-warm-200" data-motion-stagger="90">
                    @foreach(config('site.faqs') as $faq)
                        <details class="group py-6 transition-colors" data-motion="card">
                            <summary class="min-h-[44px] cursor-pointer font-serif text-xl sm:text-2xl font-light text-charcoal-900 flex items-center justify-between gap-4 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 rounded-sm">
                                <span>{{ $faq['question'] }}</span>
                                <span class="text-stone-warm-400 group-open:rotate-45 transition-transform duration-200 text-2xl font-light font-mono shrink-0 select-none" aria-hidden="true">+</span>
                            </summary>
                            <p class="pt-4 text-base font-light leading-relaxed text-stone-warm-700 max-w-3xl">
                                {{ $faq['answer'] }}
                            </p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
