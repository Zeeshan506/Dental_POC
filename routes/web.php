<?php

use App\Support\PublicSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $contract = PublicSite::page($request, 'home');

    return view("variants.{$contract['variant']}.index", $contract);
})->name('home');

Route::get('/about', fn (Request $request) => view('public.page', PublicSite::page($request, 'about')))->name('about');
Route::get('/services', fn (Request $request) => view('public.page', PublicSite::page($request, 'services')))->name('services.index');
Route::get('/services/{service}', fn (Request $request, string $service) => view('public.page', PublicSite::page($request, 'services.show', $service)))->name('services.show');
Route::get('/team', fn (Request $request) => view('public.page', PublicSite::page($request, 'team')))->name('team.index');
Route::get('/team/{member}', fn (Request $request, string $member) => view('public.page', PublicSite::page($request, 'team.show', $member)))->name('team.show');
Route::get('/patient-journey', fn (Request $request) => view('public.page', PublicSite::page($request, 'patient-journey')))->name('patient-journey');
Route::get('/reviews', fn (Request $request) => view('public.page', PublicSite::page($request, 'reviews')))->name('reviews');
Route::get('/contact', fn (Request $request) => view('public.page', PublicSite::page($request, 'contact')))->name('contact');
Route::get('/faq', fn (Request $request) => view('public.page', PublicSite::page($request, 'faq')))->name('faq');
Route::get('/privacy', fn (Request $request) => view('public.page', PublicSite::page($request, 'privacy')))->name('privacy');
Route::get('/terms', fn (Request $request) => view('public.page', PublicSite::page($request, 'terms')))->name('terms');
