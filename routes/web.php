<?php

use App\Support\PublicSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $contract = PublicSite::page($request, 'home');

    return view("variants.{$contract['variant']}.index", $contract);
})->name('home');

Route::get('/about', fn (Request $request) => PublicSite::view($request, 'about'))->name('about');
Route::get('/services', fn (Request $request) => PublicSite::view($request, 'services'))->name('services.index');
Route::get('/services/{service}', fn (Request $request, string $service) => PublicSite::view($request, 'services.show', $service))->name('services.show');
Route::get('/team', fn (Request $request) => PublicSite::view($request, 'team'))->name('team.index');
Route::get('/team/{member}', fn (Request $request, string $member) => PublicSite::view($request, 'team.show', $member))->name('team.show');
Route::get('/patient-journey', fn (Request $request) => PublicSite::view($request, 'patient-journey'))->name('patient-journey');
Route::get('/reviews', fn (Request $request) => PublicSite::view($request, 'reviews'))->name('reviews');
Route::get('/contact', fn (Request $request) => PublicSite::view($request, 'contact'))->name('contact');
Route::get('/faq', fn (Request $request) => PublicSite::view($request, 'faq'))->name('faq');
Route::get('/privacy', fn (Request $request) => PublicSite::view($request, 'privacy'))->name('privacy');
Route::get('/terms', fn (Request $request) => PublicSite::view($request, 'terms'))->name('terms');
