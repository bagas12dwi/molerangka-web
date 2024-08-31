<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OverallQuizController;
use App\Http\Controllers\OverallUserScoreController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubMaterialController;
use App\Http\Controllers\UserScoreController;
use App\Models\UserScore;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'indexLogin']);

Route::get('login', [AuthController::class, 'indexLogin'])->name('login');
Route::get('register', [AuthController::class, 'indexRegister']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);


    Route::resource('materi', MaterialController::class);
    Route::resource('sub-materi', SubMaterialController::class);
    Route::resource('quiz-sub-materi', QuestionController::class);
    Route::resource('quiz', OverallQuizController::class);
    Route::resource('galeri', GalleryController::class);
    Route::resource('resultQuizSubmateri', UserScoreController::class);
    Route::resource('resultQuiz', OverallUserScoreController::class);
});
