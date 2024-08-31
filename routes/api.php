<?php

use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\QuizSubmateriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenSpout\Common\Entity\Row;

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


Route::post('getMateri', [MaterialController::class, 'getMateri']);
Route::get('getDetailSubmateri/{idSubmateri}', [MaterialController::class, 'getDetailSubmateri']);
Route::post('getQuizSubmateri', [QuizSubmateriController::class, 'getQuestionsBySubMaterial']);
Route::post('submitUserAnswers', [QuizSubmateriController::class, 'submitUserAnswers']);
Route::post('submitScore', [QuizSubmateriController::class, 'submitScore']);


Route::get('getQuiz', [QuizController::class, 'getQuestion']);
Route::post('submitUserAnswerQuiz', [QuizController::class, 'submitUserAnswers']);
Route::post('submitQuizScore', [QuizController::class, 'submitScore']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('getDetail', [AuthController::class, 'getDetail']);
Route::post('changePassword', [AuthController::class, 'changePassword']);
Route::post('changeProfilePicture', [AuthController::class, 'changeProfilePicture']);

Route::post('getAchievementSubmateri', [AchievementController::class, 'getAchievementSubmateri']);
Route::post('getAchievement', [AchievementController::class, 'getAchievement']);
Route::post('calculateProgres', [AchievementController::class, 'calculateProgres']);

Route::get('getGaleri', [GalleryController::class, 'getGaleri']);
