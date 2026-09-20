<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $allowedVariants = ['a', 'b'];

    if ($request->has('variant')) {
        $requestedVariant = strtolower((string) $request->query('variant'));
        $variant = in_array($requestedVariant, $allowedVariants, true) ? $requestedVariant : 'a';
        session(['variant' => $variant]);
    } else {
        $sessionVariant = strtolower((string) session('variant', 'a'));
        $variant = in_array($sessionVariant, $allowedVariants, true) ? $sessionVariant : 'a';
        session(['variant' => $variant]);
    }

    return view("variants.{$variant}.index", [
        'variant' => $variant,
        'clinic' => config('clinic'),
    ]);
});
