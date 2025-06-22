<?php

use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProjectFrontController;
use App\Http\Controllers\FrontEnd\SkillFrontController;
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


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/blog', [HomeController::class, 'blogs'])->name('home.blog');
Route::get('/blog/{id}', [HomeController::class, 'show'])->name('blog.show');


Route::get('/skill/{id}', [SkillFrontController::class, 'show'])->name('skill.show');

Route::get('/project/{id}', [ProjectFrontController::class, 'index'])->name('project.index');
Route::get('/project/show/{id}', [ProjectFrontController::class, 'show'])->name('project.show');

