<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::get('/', static function () {
    return view('index');
});

Route::get('/main', static function (){
    return view('index');
});

Route::get('/auth', [SessionController::class, 'create'])->middleware('guest');
Route::post('/auth', [SessionController::class, 'store']);

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');



Route::get('/events', static function (){
    return view('events.index');
});

Route::get('/gallery', static function (){
    return view('gallery.index');
});

Route::get('/user', static function (){
    return view('user.index');
});

Route::get('/debug', static function (){
    $projects = Project::all();
    ddd($projects);
});
