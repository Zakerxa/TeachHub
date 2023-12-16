<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\AuthTokenMiddleware;

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


// Admin Route
Route::middleware(AuthTokenMiddleware::class)->group(function () {
    Route::post('/add/teacher', [TeacherController::class, 'store']);
    Route::post('/delete/teachers', [TeacherController::class, 'destroy']);
    Route::post('/update/teacher', [TeacherController::class, 'update']);
});

// Protected CSRF Route
Route::group(['middleware' => ['web']], function () {
    Route::get('v1/csrf', function (Request $request) {
        return response()->json($request->session()->get('_token'));
    });
    Route::post('/client/review', [ReviewController::class, 'store']);
});

Route::get('/test', function (Request $request) {
    return response()->json(200);
});
// Review
// Route::get('/client/reviews', [ReviewController::class, 'index']);
// Subject
Route::get('/subjects', [TeacherController::class, 'subjects']);
// Teacher
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/topteachers', [TeacherController::class, 'topteacher']);
Route::post('/teachers/search', [TeacherController::class, 'search']);
Route::get('/teachers/details/{id}', [TeacherController::class, 'show']);
Route::get('/client/reviews/{token}', [ReviewController::class, 'reviewsWithPending']);

// Test
Route::get('/test', function (Request $request) {
    return response()->json(200);
});
