<?php

use App\Http\Controllers\Api\AccessTokensController;
use App\Http\Controllers\Api\CompanyRequestController;
use App\Http\Controllers\Api\ContactRequestController;
use App\Http\Controllers\Api\Dashboard\CompaniesController;
use App\Http\Controllers\Api\Dashboard\EventsController;
use App\Http\Controllers\Api\Dashboard\LibrariesController;
use App\Http\Controllers\Api\Dashboard\ProgramsController;
use App\Http\Controllers\Api\Dashboard\PublicationsController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\JobRequestController;
use App\Http\Controllers\Api\PaymentMethodsController;
use App\Http\Controllers\Api\VolunteerRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Front Api routes
Route::apiResource('volunteer/requests', VolunteerRequestController::class);
Route::apiResource('job/requests', JobRequestController::class);
Route::apiResource('company/requests', CompanyRequestController::class);
Route::apiResource('contact/requests', ContactRequestController::class);
Route::apiResource('donation/requests', DonationController::class);

// Dashboard Api routes
Route::group([
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiResource('payment/methods', PaymentMethodsController::class);
    Route::apiResource('companies', CompaniesController::class);
    Route::apiResource('programs', ProgramsController::class);
    Route::apiResource('events', EventsController::class);
    Route::apiResource('publications', PublicationsController::class);
    Route::apiResource('libraries', LibrariesController::class);
});

// Api Authentication Routes
Route::post('auth/access-tokens', [AccessTokensController::class, 'store'])
    ->middleware('guest:sanctum');

Route::delete('auth/access-tokens/{token?}', [AccessTokensController::class, 'destroy'])
    ->middleware('auth:sanctum');
