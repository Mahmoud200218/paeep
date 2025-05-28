<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CompaniesController;
use App\Http\Controllers\Dashboard\CompaniesRequestsController;
use App\Http\Controllers\Dashboard\DonatesRequestsController;
use App\Http\Controllers\Dashboard\EventsController;
use App\Http\Controllers\Dashboard\JobRequestsController;
use App\Http\Controllers\Dashboard\LibrariesController;
use App\Http\Controllers\Dashboard\PaymentMethodsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProgramsController;
use App\Http\Controllers\Dashboard\PublicationsController;
use App\Http\Controllers\Dashboard\VolunteerRequestsController;

Route::group([
    // 'middleware' => 'auth:admin',
    'prefix' => '/dashboard',
    'as' => 'dashboard.',
    'middleware' => 'auth',
], function () {
    Route::get('events/index', [EventsController::class, 'index']);
    Route::get('programs/index', [ProgramsController::class, 'index']);
    Route::get('companies/index', [CompaniesController::class, 'index']);
    Route::get('publications/index', [PublicationsController::class, 'index']);
    Route::get('libraries/index', [LibrariesController::class, 'index']);
    Route::get('volunteers/index', [VolunteerRequestsController::class, 'index']);
    Route::get('jobs/index', [JobRequestsController::class, 'index']);
    Route::get('companies/requests/index', [CompaniesRequestsController::class, 'index'])->name('companies.requests');
    Route::get('payments/index', [PaymentMethodsController::class, 'index'])->name('payments');
    Route::get('donates/index', [DonatesRequestsController::class, 'index'])->name('donates');
    Route::resource('/events', EventsController::class);
    Route::resource('/programs', ProgramsController::class);
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/publications', PublicationsController::class);
    Route::resource('/libraries', LibrariesController::class);
    Route::resource('/volunteers', VolunteerRequestsController::class);
    Route::resource('/jobs', JobRequestsController::class);
    Route::resource('/companiesRequest', CompaniesRequestsController::class);
    Route::resource('/donates', DonatesRequestsController::class);
    Route::resource('/payments', PaymentMethodsController::class);

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::match(['post', 'put'], 'checkout/option/{event}', [EventsController::class, 'checkoutOption'])
        ->name('checkout.option');
});
