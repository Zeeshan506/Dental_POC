@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <x-variant-b.page-header
            chapter="04 / Practitioners"
            kicker="Calm editorial foundation"
            :heading="$page['heading']"
            :intro="$page['intro']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-16 sm:space-y-24">
                <!-- Clinical Director Editorial Feature -->
                <div class="border border-stone-warm-200 bg-stone-warm-100/30 rounded-2xl p-6 sm:p-12" data-motion="group">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                        <div class="lg:col-span-5" data-motion="image">
                            <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-stone-warm-200/60 border border-stone-warm-200">
                                <img
                                    src="{{ asset('images/variant-a/doctor-tariq-bhatti.png') }}"
                                    alt="Dr. Tariq Bhatti, Clinical Director & Principal Dentist"
                                    class="w-full h-full object-cover object-top filter grayscale contrast-105"
                                />
                                <div class="absolute bottom-3 left-3 right-3 bg-stone-warm-50/95 border border-stone-warm-200 rounded-lg p-3">
                                    <p class="font-serif text-sm font-medium text-charcoal-900">Dr. Tariq Bhatti</p>
                                    <p class="text-xs text-stone-warm-600 font-mono mt-0.5">DDS, FAGD, FICOI</p>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-7 space-y-6">
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block" data-motion="rise">Clinical Leadership</span>
                            <h2 class="font-serif text-3xl sm:text-4xl font-light text-charcoal-900">
                                Dr. Tariq Bhatti
                            </h2>
                            <p class="text-xs font-mono uppercase tracking-wider text-stone-warm-600">
                                Clinical Director &amp; Principal Dentist &bull; DDS, FAGD, FICOI
                            </p>

                            <blockquote class="font-serif text-lg sm:text-xl font-light italic text-charcoal-900 leading-relaxed border-l border-stone-warm-300 pl-6 py-1 my-4">
                                &ldquo;{{ config('clinic.doctor.philosophy') }}&rdquo;
                            </blockquote>

                            <p class="text-stone-warm-700 font-light leading-relaxed text-sm sm:text-base">
                                {{ config('clinic.doctor.bio') }}
                            </p>

                            <div class="pt-4 flex flex-wrap items-center gap-4">
                                <a
                                    href="{{ url('/team/dr-tariq-bhatti?variant='.$variant) }}"
                                    class="inline-flex min-h-[44px] items-center px-6 py-3 rounded-full bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    data-motion-interactive
                                >
                                    View Full Practitioner Profile &rarr;
                                </a>
                                <a
                                    href="{{ url('/contact?variant='.$variant) }}"
                                    class="inline-flex min-h-[44px] items-center px-6 py-3 rounded-full border border-stone-warm-300 bg-stone-warm-50 text-charcoal-900 text-xs font-mono uppercase tracking-wider hover:bg-stone-warm-100 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    data-motion-interactive
                                >
                                    Book Consultation Dialogue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Supporting Team Profiles Section -->
                <div>
                    <div class="border-b border-stone-warm-200 pb-6 mb-8">
                        <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">Practice Colleagues</span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">
                            Supporting Clinical Team
                        </h3>
                        <p class="mt-2 text-sm text-stone-warm-700 font-light">
                            Supporting team member profiles are displayed as unapproved placeholders until formal biographical and credential signoff is provided.
                        </p>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2" data-motion-stagger="90">
                        @foreach($page['resources'] as $member)
                            <article class="border border-stone-warm-200 rounded-2xl bg-stone-warm-100/30 p-6 sm:p-8 flex flex-col justify-between" data-motion="card">
                                <div>
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <h2 class="font-serif text-2xl font-light text-charcoal-900">
                                                {{ $member['name'] }}
                                            </h2>
                                            <p class="mt-1 text-xs font-mono uppercase tracking-wider text-stone-warm-600">
                                                {{ $member['role'] }}
                                            </p>
                                        </div>
                                        @if(empty($member['approved']))
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-mono uppercase tracking-wider bg-stone-warm-200 text-stone-warm-700">
                                                Placeholder
                                            </span>
                                        @endif
                                    </div>

                                    <p class="mt-4 text-sm font-light text-stone-warm-700 leading-relaxed">
                                        {{ $member['details'] ?? 'Profile information is pending client approval.' }}
                                    </p>

                                    @if(empty($member['approved']))
                                        <p class="mt-3 text-xs font-mono text-stone-warm-500">
                                            Profile status: client approval required.
                                        </p>
                                    @endif
                                </div>

                                <div class="mt-8 pt-4 border-t border-stone-warm-200">
                                    <a
                                        href="{{ url('/team/'.$member['slug']).'?variant='.$variant }}"
                                        class="inline-flex min-h-[44px] items-center text-xs font-mono uppercase tracking-wider text-charcoal-900 underline underline-offset-4 hover:text-stone-warm-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                    >
                                        Read Profile &rarr;
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <x-variant-b.cta-section />
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
