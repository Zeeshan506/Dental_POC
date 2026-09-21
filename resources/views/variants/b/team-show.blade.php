@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    @php
        $member = $page['resource'];
        $isDoctor = ($member['slug'] ?? '') === 'dr-tariq-bhatti';
        $doctor = config('clinic.doctor');
    @endphp

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <!-- Breadcrumb / Back Link -->
        <div class="bg-stone-warm-100/50 border-b border-stone-warm-200 px-4 py-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <a
                    href="{{ url('/team?variant='.$variant) }}"
                    class="inline-flex min-h-[44px] items-center text-xs font-mono uppercase tracking-wider text-stone-warm-600 hover:text-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                >
                    &larr; Back to Team Overview
                </a>
            </div>
        </div>

        <x-variant-b.page-header
            chapter="Practitioner Profile"
            kicker="Calm editorial foundation"
            :heading="$member['name']"
            :intro="$member['role']"
        />

        <section class="px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="mx-auto max-w-4xl">
                @if($isDoctor)
                    <!-- Dr. Tariq Bhatti Full Editorial Profile -->
                    <article class="space-y-12">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                            <div class="md:col-span-5" data-motion="image">
                                <div class="border border-stone-warm-200 bg-stone-warm-100/30 p-3 sm:p-4 rounded-2xl">
                                    <div class="relative aspect-[3/4] rounded-xl overflow-hidden bg-stone-warm-200/60 border border-stone-warm-200">
                                        <img
                                            src="{{ asset('images/variant-a/doctor-tariq-bhatti.png') }}"
                                            alt="{{ $doctor['name'] }}, {{ $doctor['title'] }}"
                                            class="w-full h-full object-cover object-top filter grayscale contrast-105"
                                        />
                                        <div class="absolute bottom-3 left-3 right-3 bg-stone-warm-50/95 border border-stone-warm-200 rounded-lg p-3">
                                            <p class="font-serif text-sm font-medium text-charcoal-900">{{ $doctor['name'] }}</p>
                                            <p class="text-xs text-stone-warm-600 font-mono mt-0.5">{{ $doctor['credentials'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-7 space-y-6">
                                <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block">Practitioner Overview</span>
                                <h2 class="font-serif text-2xl sm:text-3xl font-light text-charcoal-900">
                                    {{ $doctor['title'] }}
                                </h2>

                                <blockquote class="font-serif text-lg sm:text-xl font-light italic text-charcoal-900 leading-relaxed border-l border-stone-warm-300 pl-5">
                                    &ldquo;{{ $doctor['philosophy'] }}&rdquo;
                                </blockquote>

                                <div class="space-y-4 text-stone-warm-700 font-light leading-relaxed text-sm sm:text-base">
                                    <p>{{ $doctor['bio'] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Accreditations & Care Disciplines -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-stone-warm-200" data-motion="group">
                            <div>
                                <h3 class="font-serif text-xl font-light text-charcoal-900 mb-4">Accreditations &amp; Honors</h3>
                                <ul class="divide-y divide-stone-warm-200 border-y border-stone-warm-200">
                                    @foreach($doctor['accreditations'] as $accreditation)
                                        <li class="py-3 text-xs sm:text-sm text-stone-warm-800 font-light">
                                            {{ $accreditation }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-serif text-xl font-light text-charcoal-900 mb-4">Focus Disciplines</h3>
                                <ul class="divide-y divide-stone-warm-200 border-y border-stone-warm-200">
                                    <li class="py-3 text-xs sm:text-sm text-stone-warm-800 font-light">Preventative &amp; Diagnostic Care</li>
                                    <li class="py-3 text-xs sm:text-sm text-stone-warm-800 font-light">Cosmetic Smile Architecture</li>
                                    <li class="py-3 text-xs sm:text-sm text-stone-warm-800 font-light">Restorative &amp; Implant Dentistry</li>
                                    <li class="py-3 text-xs sm:text-sm text-stone-warm-800 font-light">Pediatric &amp; Multi-Generational Care</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Status Notice & Consultation CTA -->
                        <div class="pt-6 flex flex-col sm:flex-row sm:items-center justify-between gap-6 border-t border-stone-warm-200">
                            <p class="text-xs font-mono text-stone-warm-600">
                                Established POC content is displayed on the homepage. Final biography and credentials require client review.
                            </p>
                            <a
                                href="{{ url('/contact?variant='.$variant) }}"
                                class="inline-flex min-h-[44px] items-center justify-center px-6 py-3 bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                data-motion-interactive
                            >
                                Schedule Consultation Dialogue
                            </a>
                        </div>
                    </article>
                @else
                    <!-- Supporting Team Member Honest Placeholder Profile -->
                    <article class="border border-stone-warm-300 rounded-2xl bg-stone-warm-100/30 p-8 sm:p-12 space-y-8" data-motion="card">
                        <div>
                            <span class="text-xs font-mono uppercase tracking-widest text-stone-warm-600 block mb-2">
                                {{ $member['role'] }}
                            </span>
                            <h2 class="font-serif text-3xl sm:text-4xl font-light text-charcoal-900">
                                {{ $member['name'] }}
                            </h2>
                        </div>

                        <div class="border-l-4 border-brass-500 bg-stone-warm-100 p-5 rounded-r-lg">
                            <p class="text-sm font-mono text-charcoal-900">
                                Profile status: client approval required.
                            </p>
                        </div>

                        <div class="text-stone-warm-700 font-light leading-relaxed text-base sm:text-lg">
                            <p>{{ $member['details'] ?? 'No credentials, biography, accreditation, or clinical claims have been supplied for this placeholder profile.' }}</p>
                        </div>

                        <div class="pt-6 border-t border-stone-warm-200 flex flex-wrap items-center justify-between gap-4">
                            <p class="text-xs font-mono text-stone-warm-600">
                                Supporting practitioner profiles will be updated once client credentials are submitted.
                            </p>
                            <a
                                href="{{ url('/contact?variant='.$variant) }}"
                                class="inline-flex min-h-[44px] items-center px-6 py-3 bg-charcoal-900 text-stone-warm-50 text-xs font-mono uppercase tracking-wider hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"
                                data-motion-interactive
                            >
                                Contact Clinic Concierge
                            </a>
                        </div>
                    </article>
                @endif
            </div>
        </section>
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
