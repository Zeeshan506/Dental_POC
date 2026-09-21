@props(['variant' => 'a'])
@php
    $currentPath = '/'.ltrim(request()->path(), '/');
    $currentPath = $currentPath === '/' ? '/' : rtrim($currentPath, '/');
    $query = array_merge(request()->query(), ['variant' => $variant]);
    $linkClass = $variant === 'b'
        ? 'text-stone-warm-200 hover:text-stone-warm-50 focus-visible:ring-stone-warm-50'
        : 'text-charcoal-800 hover:text-charcoal-900 focus-visible:ring-charcoal-900';
@endphp
<nav aria-label="Primary navigation" class="hidden lg:block">
    <ul class="flex items-center gap-1">
        @foreach(config('site.navigation') as $item)
            @php
                $isActive = $currentPath === $item['path'];
                $href = url($item['path']).'?'.http_build_query($query);
            @endphp
            <li>
                <a href="{{ $href }}" @class([
                    'inline-flex min-h-[44px] items-center rounded-sm px-2 text-xs font-semibold uppercase tracking-wider focus:outline-none focus-visible:ring-2',
                    $linkClass,
                    'underline underline-offset-4' => $isActive,
                ]) @if($isActive) aria-current="page" @endif>
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>

<details class="relative lg:hidden">
    <summary class="flex min-h-[44px] cursor-pointer list-none items-center rounded-sm px-3 text-xs font-semibold uppercase tracking-wider focus:outline-none focus-visible:ring-2 {{ $linkClass }}">
        Menu
    </summary>
    <nav aria-label="Mobile primary navigation" class="absolute right-0 z-30 mt-2 w-64 border border-stone-warm-300 bg-stone-warm-50 p-2 shadow-xl">
        <ul class="grid gap-1">
            @foreach(config('site.navigation') as $item)
                @php
                    $isActive = $currentPath === $item['path'];
                    $href = url($item['path']).'?'.http_build_query($query);
                @endphp
                <li>
                    <a href="{{ $href }}" class="flex min-h-[44px] items-center px-3 text-sm text-charcoal-900 hover:bg-stone-warm-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-charcoal-900" @if($isActive) aria-current="page" @endif>
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</details>
