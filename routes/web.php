<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Group;
use App\Models\Project;
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

Route::get('/', [MainController::class, 'index'])->middleware('auth');

Route::get('/auth', [SessionController::class, 'create'])->name('auth');
Route::post('/auth', [SessionController::class, 'store']);

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/events', [EventsController::class, 'index'])->middleware('auth');

Route::get('/gallery', [GalleryController::class, 'index'])->middleware('auth');
Route::get('/gallery/{project}', [GalleryController::class, 'details'])->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/projects/new', [UserController::class, 'newProjectForm'])->middleware('auth');
Route::post('/user/projects/new', [UserController::class, 'newProject'])->middleware('auth');
