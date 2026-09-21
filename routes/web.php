<?php

use App\Support\PublicSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $contract = PublicSite::page($request, 'home');

    return view("variants.{$contract['variant']}.index", $contract);
})->name('home');

$renderPublicPage = function (Request $request, string $pageKey, ?string $slug = null) {
    $contract = PublicSite::page($request, $pageKey, $slug);
    $view = $contract['variant'] === 'a' ? 'variants.a.page' : 'public.page';

    return view($view, $contract);
};

Route::get('/about', fn (Request $request) => $renderPublicPage($request, 'about'))->name('about');
Route::get('/services', fn (Request $request) => $renderPublicPage($request, 'services'))->name('services.index');
Route::get('/services/{service}', fn (Request $request, string $service) => $renderPublicPage($request, 'services.show', $service))->name('services.show');
Route::get('/team', fn (Request $request) => $renderPublicPage($request, 'team'))->name('team.index');
Route::get('/team/{member}', fn (Request $request, string $member) => $renderPublicPage($request, 'team.show', $member))->name('team.show');
Route::get('/patient-journey', fn (Request $request) => $renderPublicPage($request, 'patient-journey'))->name('patient-journey');
Route::get('/reviews', fn (Request $request) => $renderPublicPage($request, 'reviews'))->name('reviews');
Route::get('/contact', fn (Request $request) => $renderPublicPage($request, 'contact'))->name('contact');
Route::get('/faq', fn (Request $request) => $renderPublicPage($request, 'faq'))->name('faq');
Route::get('/privacy', fn (Request $request) => $renderPublicPage($request, 'privacy'))->name('privacy');
Route::get('/terms', fn (Request $request) => $renderPublicPage($request, 'terms'))->name('terms');
