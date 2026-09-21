<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-stone-warm-50 text-charcoal-900 antialiased" data-motion-profile="{{ ($variant ?? session('variant', 'a')) === 'b' ? 'editorial' : 'expressive' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', config('clinic.description'))">
    <title>@yield('title', config('clinic.name') . ' — ' . config('clinic.tagline'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col font-sans selection:bg-stone-warm-300 selection:text-charcoal-900">
    @yield('content')
    {{ $slot ?? '' }}

    <x-shared.variant-switcher :active-variant="$variant ?? session('variant', 'a')" />
</body>
</html>
