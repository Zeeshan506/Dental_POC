@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="03 / Disciplines"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <!-- Restrained Hairline Treatment Rows -->
                <div class="divide-y divide-stone-warm-200 border-y border-stone-warm-200" data-motion-stagger="100">
                    @foreach($page['resources'] as $index => $service)
                        <article class="group py-12 sm:py-16 transition-colors duration-300 hover:bg-stone-warm-100/30 px-4 sm:px-8 -mx-4 sm:-mx-8 rounded-xl" data-motion="group" data-motion-interactive>
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                                <!-- Column 1: Index & Title (4 cols) -->
                                <div class="lg:col-span-4">
                                    <div class="flex items-baseline gap-4 mb-2">
                                        <span class="text-xs font-mono text-stone-warm-600">0{{ $index + 1 }}</span>
                                        <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900 group-hover:text-charcoal-950 transition-colors">
                                            {{ $service['name'] }}
                                        </h2>
                                    </div>
                                    <p class="text-xs font-mono uppercase tracking-wider text-stone-warm-600 pl-8">
                                        Clinical Discipline
                                    </p>
                                </div>

                                <!-- Column 2: Introduction & Suitability (5 cols) -->
                                <div class="lg:col-span-5 space-y-4">
                                    <p class="text-sm sm:text-base text-stone-warm-700 font-light leading-relaxed">
                                        {{ $service['introduction'] }}
                                    </p>
                                    <p class="text-xs text-stone-warm-600 font-light italic">
                                        Suitability: {{ $service['suitability'] }}
                                    </p>
                                </div>

                                <!-- Column 3: Exploration Link (3 cols) -->
                                <div class="lg:col-span-3 flex lg:justify-end items-center">
                                    <a
                                        href="{{ url('/services/'.$service['slug']).'?variant='.$variant }}"
                                        class="inline-flex min-h-[44px] items-center px-5 py-2.5 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-xs font-mono uppercase tracking-wider text-charcoal-900 hover:bg-stone-warm-100 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                        data-motion-interactive
                                    >
                                        Explore Details &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Editorial Assurance Aside -->
                <aside class="mt-16 grid grid-cols-1 lg:grid-cols-2 overflow-hidden bg-charcoal-900 rounded-2xl" data-motion="group">
                    <div class="p-8 sm:p-12 lg:p-16 flex flex-col justify-center">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-300" data-motion="rise">Clinical Clarity</span>
                        <h3 class="mt-4 font-serif text-3xl sm:text-4xl font-light leading-tight text-stone-warm-50" data-motion="headline" data-motion-delay="80">
                            Precision starts with the full picture.
                        </h3>
                        <p class="mt-5 max-w-lg text-sm sm:text-base font-light leading-relaxed text-stone-warm-300" data-motion="copy" data-motion-delay="160">
                            We pair contemporary diagnostics with an unhurried explanation, so every treatment path is understood before it begins.
                        </p>
                        <a
                            href="{{ url('/contact?variant=b') }}"
                            class="mt-8 inline-flex min-h-[44px] items-center self-start border-b border-stone-warm-300 pb-1 text-xs font-mono uppercase tracking-wider text-stone-warm-50 hover:text-stone-warm-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-stone-warm-50"
                            data-motion="action"
                            data-motion-delay="240"
                            data-motion-interactive
                        >
                            Arrange a consultation &rarr;
                        </a>
                    </div>
                    <div class="min-h-72 overflow-hidden" data-motion="image">
                        <img
                            src="{{ asset('images/variant-b/landing-2.jpg') }}"
                            alt="Prepared treatment room used for clinical planning"
                            class="h-full w-full object-cover grayscale contrast-125"
                        />
                    </div>
                </aside>
            </div>
        </section>

        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
