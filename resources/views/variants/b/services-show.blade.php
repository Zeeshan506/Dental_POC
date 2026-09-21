@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    @php($service = $page['resource'])

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <!-- Breadcrumb / Back Link -->
        <div class="bg-stone-warm-100/50 border-b border-stone-warm-200 px-4 py-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <a
                    href="{{ url('/services?variant='.$variant) }}"
                    class="inline-flex min-h-[44px] items-center text-xs font-mono uppercase tracking-wider text-stone-warm-600 hover:text-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                >
                    &larr; Back to Treatments Overview
                </a>
            </div>
        </div>

        <x-variant-b.page-header
            chapter="Clinical Discipline"
            :heading="$service['name']"
            :intro="$service['introduction']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <article class="space-y-12 text-stone-warm-700">
                    <!-- Suitability Section -->
                    <section class="border-b border-stone-warm-200 pb-10" data-motion="copy">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Clinical Assessment</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">Suitability</h2>
                        <p class="mt-4 text-base sm:text-lg font-light leading-relaxed text-stone-warm-700">{{ $service['suitability'] }}</p>
                    </section>

                    <!-- Process Section -->
                    <section class="border-b border-stone-warm-200 pb-10" data-motion="copy">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Treatment Pathway</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">Process</h2>
                        <p class="mt-4 text-base sm:text-lg font-light leading-relaxed text-stone-warm-700">{{ $service['process'] }}</p>
                    </section>

                    <!-- Benefits and considerations -->
                    <section class="border-b border-stone-warm-200 pb-10" data-motion="copy">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Considerations</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">Benefits and considerations</h2>
                        @if(!empty($service['benefits']))
                            <ul class="mt-4 list-disc space-y-2 pl-5 text-base font-light text-stone-warm-700">
                                @foreach($service['benefits'] as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-4 text-sm text-stone-warm-600 font-light italic">Detailed benefits will be outlined during consultation.</p>
                        @endif
                    </section>

                    <!-- Technology and materials -->
                    <section class="border-b border-stone-warm-200 pb-10" data-motion="copy">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Materials &amp; Precision</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">Technology and materials</h2>
                        <p class="mt-4 text-base sm:text-lg font-light leading-relaxed text-stone-warm-700">{{ $service['technology'] }}</p>
                    </section>

                    <!-- Frequently Asked Questions -->
                    @if(!empty($service['faqs']))
                        <section class="border-b border-stone-warm-200 pb-10" data-motion="group">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Clarifications</span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 mb-6">Frequently asked questions</h2>
                            <div class="grid gap-3">
                                @foreach($service['faqs'] as $faq)
                                    <details class="border border-stone-warm-300 p-5 rounded-xl bg-stone-warm-100/20" data-motion="card">
                                        <summary class="min-h-[44px] cursor-pointer font-serif text-lg font-medium text-charcoal-900 flex items-center justify-between focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                                            <span>{{ $faq['question'] }}</span>
                                            <span class="text-stone-warm-400 text-xl select-none" aria-hidden="true">+</span>
                                        </summary>
                                        <p class="pt-3 text-sm font-light text-stone-warm-700 leading-relaxed">{{ $faq['answer'] }}</p>
                                    </details>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- Related Services -->
                    @if(!empty($service['related']))
                        <section class="border-b border-stone-warm-200 pb-10" data-motion="group">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Connected Care</span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 mb-4">Related services</h2>
                            <ul class="flex flex-wrap gap-3">
                                @foreach($service['related'] as $related)
                                    <li>
                                        <a
                                            href="{{ url('/services/'.$related).'?variant='.$variant }}"
                                            class="inline-flex min-h-[44px] items-center px-4 py-2 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-xs font-mono uppercase tracking-wider text-charcoal-900 hover:bg-stone-warm-100 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                        >
                                            {{ str($related)->replace('-', ' ')->title() }} &rarr;
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endif

                    <!-- Action CTA & Disclaimer -->
                    <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-6" data-motion="action">
                        <a
                            href="{{ url($service['cta']['path']).'?variant='.$variant }}"
                            class="inline-flex min-h-[44px] items-center justify-center bg-charcoal-900 px-7 py-3.5 text-xs font-mono uppercase tracking-wider text-stone-warm-50 hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 focus-visible:ring-offset-2"
                            data-motion-interactive
                        >
                            {{ $service['cta']['label'] }}
                        </a>

                        <p class="text-xs font-mono text-stone-warm-600 max-w-md">
                            Treatment information is educational and individual suitability must be discussed with a clinician.
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
