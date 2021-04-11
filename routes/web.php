<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EntryController;

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
// })->name('/');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    
    Route::post('/sessions/set', [SessionController::class, 'set'])->name('sessions.set');;
    Route::get('/sessions/{session}/delete', [SessionController::class, 'delete'])->name('sessions.delete');
    Route::resource('/sessions', SessionController::class);
    
    Route::get('/entries/{entry}/delete', [EntryController::class, 'delete'])->name('entries.delete');
    Route::resource('/entries', EntryController::class);
    
});



/* Routes for Administrative Management */
// Admins without Authentication
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    //Login Routes
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',[LoginController::class, 'login'])->name('login.submit');;
});

// Admins with Authentication
Route::prefix('/admin')->name('admin.')->namespace('Admin')->middleware('auth:admin')->group(function(){
    Route::get('/',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
    
});
