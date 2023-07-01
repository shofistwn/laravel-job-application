<?php

use App\Http\Controllers\Api\JobApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::prefix('v1')
  ->controller(JobApplicationController::class)
  ->group(function () {
    Route::post('/submit-application', 'submitApplication');
    Route::post('/validate-email', 'validateEmail');
    Route::post('/validate-phone', 'validatePhone');
    Route::post('/validate-skills', 'validateSkills');
    Route::get('/skills', 'getSkills');
    Route::get('/jobs', 'getJobs');
    Route::get('/years-of-birth', 'getYearOfBirth');
  });