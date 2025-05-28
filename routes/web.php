<?php

use App\Http\Controllers\Front\CompanyRequestController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DonateController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\JobRequestController;
use App\Http\Controllers\Front\VolunteerRequestController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Front Routes Definition (Views)
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('principles', [HomeController::class, 'principles'])->name('principles');
    Route::get('objectives', [HomeController::class, 'objectives'])->name('objectives');
    Route::get('publications/reports', [HomeController::class, 'publications_reports'])->name('publications.reports');
    Route::get('visualLibrary', [HomeController::class, 'visualLibrary'])->name('visual.library');
    Route::get('events', [HomeController::class, 'events'])->name('events');
    Route::get('volunteer/request', [VolunteerRequestController::class, 'index'])->name('volunteer.request');
    Route::post('volunteer/store', [VolunteerRequestController::class, 'store'])->name('volunteer.store');
    Route::get('job/request', [JobRequestController::class, 'index'])->name('job.request');
    Route::post('job/store', [JobRequestController::class, 'store'])->name('job.store');
    Route::get('company/request', [CompanyRequestController::class, 'index'])->name('company.request');
    Route::post('company/store', [CompanyRequestController::class, 'store'])->name('company.store');
    Route::get('donate', [HomeController::class, 'donate'])->name('donate');
    Route::post('donate/store', [DonateController::class, 'store'])->name('donate.store');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('success', [HomeController::class, 'success'])->name('success');
    Route::get('failed', [HomeController::class, 'failed'])->name('failed');
    Route::get('all/events', [HomeController::class, 'allEvents'])->name('all.events');
    Route::get('all/programs', [HomeController::class, 'allPrograms'])->name('all.programs');

    // Details pages
    Route::get('event/details/{event}', [HomeController::class, 'eventDetails'])->name('event.details');
    Route::get('program/details/{program}', [HomeController::class, 'programDetails'])->name('program.details');
    Route::get('library/details/{library}', [HomeController::class, 'libraryDetails'])->name('library.details');
});

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::delete('contact/destroy/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

// Social Login Routes | Google OR Facebook
Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])
    ->name('auth.socialite.redirect');

Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])
    ->name('auth.socialite.callback');

// Payments Routes
Route::any('payment/{slug}/return', [DonateController::class, 'callback'])->name('payment.return');

Route::any('payment/{slug}/cancel', [DonateController::class, 'cancel'])->name('payment.cancel');

require __DIR__ . '/dashboard.php';
