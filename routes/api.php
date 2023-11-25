<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
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


// Protected CSRF Route
Route::group(['middleware' => ['web']], function () {
    Route::get('v1/csrf', function (Request $request) {
        return response()->json($request->session()->get('_token'));
    });
    Route::post('client/review', [ReviewController::class, 'store']);
    Route::post('client/requestReview', [ReviewController::class, 'requestReview']);
    Route::post('client/deleteReview', [ReviewController::class, 'destory']);
});

Route::get('/client/reviews', [ReviewController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/details/{id}', [TeacherController::class, 'show']);
Route::get('/teachers/search', [TeacherController::class, 'search']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);
Route::delete('/teacher/delete/{id}', [TeacherController::class, 'destroy']);
