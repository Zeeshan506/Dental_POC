<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-stone-warm-50 text-charcoal-900 antialiased" data-motion-profile="{{ ($variant ?? session('variant', 'a')) === 'b' ? 'editorial' : 'expressive' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metadata['description'] ?? trim($__env->yieldContent('description', config('clinic.description'))) }}">
    <link rel="canonical" href="{{ url($metadata['canonical_path'] ?? request()->path()) }}">
    <meta property="og:title" content="{{ $metadata['title'] ?? trim($__env->yieldContent('title', config('clinic.name').' — '.config('clinic.tagline'))) }}">
    <meta property="og:description" content="{{ $metadata['description'] ?? config('clinic.description') }}">
    <meta property="og:image" content="{{ asset('images/open-graph-placeholder.png') }}" data-placeholder="client-approved-open-graph-image-required">
    <title>{{ $metadata['title'] ?? trim($__env->yieldContent('title', config('clinic.name').' — '.config('clinic.tagline'))) }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col overflow-x-clip font-sans selection:bg-stone-warm-300 selection:text-charcoal-900">
    @yield('content')
    {{ $slot ?? '' }}

    <x-shared.variant-switcher :active-variant="$variant ?? session('variant', 'a')" />
</body>
</html>
