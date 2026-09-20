@props(['variant' => null])
@php
    $clinic = config('clinic');
@endphp
<header class="w-full bg-stone-warm-50 border-b border-stone-warm-200" data-motion="fade">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand -->
            <div class="flex flex-col">
                <a href="{{ url('/') }}" class="group flex flex-col focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 rounded-sm" data-motion-interactive>
                    <span class="font-serif text-xl sm:text-2xl font-semibold tracking-tight text-charcoal-900 group-hover:text-charcoal-700 transition-colors">
                        {{ $clinic['name'] }}
                    </span>
                    <span class="text-xs uppercase tracking-widest text-stone-warm-600 font-medium">
                        {{ $clinic['tagline'] }}
                    </span>
                </a>
            </div>

            <!-- Navigation Actions -->
            <div class="flex items-center gap-4 sm:gap-6">
                <!-- Phone Direct Link -->
                <a href="tel:{{ $clinic['contact']['phone_raw'] }}" class="hidden md:inline-flex items-center gap-2 text-sm font-medium text-charcoal-800 hover:text-charcoal-900 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900 rounded px-2 py-1" data-motion-interactive>
                    <svg class="w-4 h-4 text-stone-warm-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <span>{{ $clinic['contact']['phone'] }}</span>
                </a>

                <!-- Primary Consultation CTA -->
                <a href="{{ $clinic['contact']['whatsapp_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center min-h-[44px] px-5 py-2.5 rounded-full bg-charcoal-900 text-stone-warm-50 text-sm font-medium hover:bg-charcoal-800 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-charcoal-900" data-motion-interactive>
                    <span>Inquire via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</header>
