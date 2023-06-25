<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('management')->group(function () {
    Route::get('/setting', [ManagementController::class, 'setting'])->name('management.setting');
    Route::match(['get', 'post'], '/profile', [ManagementController::class, 'profile'])->name('management.profile');
});

Route::prefix('survey')->group(function () {
    Route::match(['get', 'post'], '/create', [SurveyController::class, 'create'])->name('survey.create');
    Route::get('/list', [SurveyController::class, 'list'])->name('survey.list');
    Route::match(['get', 'post'], '/template', [SurveyController::class, 'template'])->name('survey.template');
    Route::match(['get'], '/template-list', [SurveyController::class, 'templateList'])->name('survey.template-list');
});
