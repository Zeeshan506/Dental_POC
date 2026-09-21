@extends('layouts.app')

@section('content')
    <x-shared.header-shell :variant="$variant" />

    <main class="flex-1 bg-stone-warm-50 pb-24">
        <section class="border-b border-stone-warm-200 px-4 py-16 sm:px-6 sm:py-24 lg:px-8" data-motion="fade">
            <div class="mx-auto max-w-4xl">
                <p class="text-xs font-semibold uppercase tracking-widest text-stone-warm-600">{{ $variant === 'a' ? 'Expressive 2D foundation' : 'Calm editorial foundation' }}</p>
                <h1 class="mt-4 font-serif text-4xl font-semibold tracking-tight text-charcoal-900 sm:text-5xl" data-testid="page-heading">{{ $page['heading'] }}</h1>
                <p class="mt-6 max-w-3xl text-lg leading-relaxed text-stone-warm-700">{{ $page['intro'] }}</p>
            </div>
        </section>

        <section class="px-4 py-12 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                @if($page['key'] === 'services')
                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach($page['resources'] as $service)
                            <a href="{{ url('/services/'.$service['slug']).'?variant='.$variant }}" class="block min-h-[44px] border border-stone-warm-300 p-5 hover:border-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">
                                <h2 class="font-serif text-2xl text-charcoal-900">{{ $service['name'] }}</h2>
                                <p class="mt-2 text-sm leading-relaxed text-stone-warm-700">{{ $service['introduction'] }}</p>
                            </a>
                        @endforeach
                    </div>
                @elseif($page['key'] === 'services.show')
                    @php($service = $page['resource'])
                    <article class="space-y-8 text-stone-warm-700">
                        <section><h2 class="font-serif text-2xl text-charcoal-900">Suitability</h2><p class="mt-2">{{ $service['suitability'] }}</p></section>
                        <section><h2 class="font-serif text-2xl text-charcoal-900">Process</h2><p class="mt-2">{{ $service['process'] }}</p></section>
                        <section><h2 class="font-serif text-2xl text-charcoal-900">Benefits and considerations</h2><ul class="mt-2 list-disc space-y-1 pl-5">@foreach($service['benefits'] as $benefit)<li>{{ $benefit }}</li>@endforeach</ul></section>
                        <section><h2 class="font-serif text-2xl text-charcoal-900">Technology and materials</h2><p class="mt-2">{{ $service['technology'] }}</p></section>
                        @if($service['faqs'])<section><h2 class="font-serif text-2xl text-charcoal-900">Frequently asked questions</h2><div class="mt-2 grid gap-3">@foreach($service['faqs'] as $faq)<details class="border border-stone-warm-300 p-4"><summary class="min-h-[44px] cursor-pointer font-medium text-charcoal-900">{{ $faq['question'] }}</summary><p class="pt-3">{{ $faq['answer'] }}</p></details>@endforeach</div></section>@endif
                        @if($service['related'])<section><h2 class="font-serif text-2xl text-charcoal-900">Related services</h2><ul class="mt-2 flex flex-wrap gap-3">@foreach($service['related'] as $related)<li><a href="{{ url('/services/'.$related).'?variant='.$variant }}" class="inline-flex min-h-[44px] items-center underline focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900">{{ str($related)->replace('-', ' ')->title() }}</a></li>@endforeach</ul></section>@endif
                        <a href="{{ url($service['cta']['path']).'?variant='.$variant }}" class="inline-flex min-h-[44px] items-center bg-charcoal-900 px-5 py-2 text-sm font-semibold text-stone-warm-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 focus-visible:ring-offset-2">{{ $service['cta']['label'] }}</a>
                    </article>
                @elseif($page['key'] === 'team')
                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach($page['resources'] as $member)
                            <a href="{{ url('/team/'.$member['slug']).'?variant='.$variant }}" class="block min-h-[44px] border border-stone-warm-300 p-5 hover:border-charcoal-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900"><h2 class="font-serif text-2xl text-charcoal-900">{{ $member['name'] }}</h2><p class="mt-2 text-sm text-stone-warm-700">{{ $member['role'] }}</p></a>
                        @endforeach
                    </div>
                @elseif($page['key'] === 'team.show')
                    @php($member = $page['resource'])
                    <article class="border border-stone-warm-300 p-6"><p class="text-sm font-semibold uppercase tracking-widest text-stone-warm-600">{{ $member['role'] }}</p><p class="mt-4 leading-relaxed text-stone-warm-700">{{ $member['details'] }}</p><p class="mt-4 text-sm font-medium text-charcoal-900">Profile status: client approval required.</p></article>
                @elseif($page['key'] === 'patient-journey')
                    <ol class="grid gap-4 sm:grid-cols-2">@foreach(config('clinic.journey') as $step)<li class="border border-stone-warm-300 p-5"><p class="text-sm font-semibold text-stone-warm-600">{{ $step['step'] }}</p><h2 class="mt-2 font-serif text-2xl text-charcoal-900">{{ $step['title'] }}</h2><p class="mt-2 text-sm leading-relaxed text-stone-warm-700">{{ $step['description'] }}</p></li>@endforeach</ol>
                @elseif($page['key'] === 'reviews')
                    <p class="mb-6 border-l-4 border-brass-500 bg-stone-warm-100 p-4 text-sm text-charcoal-900">{{ config('site.reviews.notice') }}</p>
                    <div class="grid gap-4">@foreach(config('clinic.reviews') as $review)<article class="border border-stone-warm-300 p-5"><h2 class="font-serif text-2xl text-charcoal-900">{{ $review['patient_name'] }}</h2><p class="mt-2 text-sm text-stone-warm-700">{{ $review['excerpt'] }}</p><p class="mt-3 text-xs font-semibold uppercase tracking-widest text-stone-warm-600">Placeholder review — approval required</p></article>@endforeach</div>
                @elseif($page['key'] === 'contact')
                    <div class="grid gap-8 lg:grid-cols-2"><x-shared.consultation-form /><address class="not-italic border border-stone-warm-300 p-6 text-stone-warm-700"><h2 class="font-serif text-2xl text-charcoal-900">Contact information</h2><p class="mt-4">{{ config('clinic.contact.address.formatted') }}</p><p class="mt-2"><a class="underline" href="tel:{{ config('clinic.contact.phone_raw') }}">{{ config('clinic.contact.phone') }}</a></p><p class="mt-2"><a class="underline" href="mailto:{{ config('clinic.contact.email') }}">{{ config('clinic.contact.email') }}</a></p></address></div>
                @elseif($page['key'] === 'faq')
                    <div class="grid gap-3">@foreach(config('site.faqs') as $faq)<details class="border border-stone-warm-300 p-5"><summary class="min-h-[44px] cursor-pointer font-serif text-xl text-charcoal-900">{{ $faq['question'] }}</summary><p class="pt-4 leading-relaxed text-stone-warm-700">{{ $faq['answer'] }}</p></details>@endforeach</div>
                @elseif(in_array($page['key'], ['privacy', 'terms'], true))
                    <p class="border-l-4 border-brass-500 bg-stone-warm-100 p-5 text-charcoal-900">{{ config('site.legal.notice') }}</p>
                @else
                    <p class="text-stone-warm-700">{{ $page['intro'] }}</p>
                @endif
            </div>
        </section>
    </main>

    <x-shared.footer-shell :variant="$variant" />
@endsection
