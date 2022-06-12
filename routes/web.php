<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\CategoriesController;
use App\Models\Category;

//Botman
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Auth;

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

//Authentication
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Homepage
Route::get('/', [PagesController::class, 'index']);

//Chatbot
Route::get('/chatbot', [PagesController::class, 'chatbot']);


// Events
Route::get('/events/past', [App\Http\Controllers\EventsController::class, 'past'])->name('past');
Route::resource('/events', EventsController::class);


// Users
Route::resource('/users', UsersController::class);

// Files
Route::get('/files/download/{id}', [App\Http\Controllers\FilesController::class, 'downloadFile'])->name('downloadFile');
Route::resource('/files', FilesController::class);

// Calender
Route::resource('/mycalendar', EventUserController::class);

// Categories
Route::get('categories/{category:slug}', function (Category $category) {
  return view('events.index', [
    'events' => $category->events
  ]);
});

/**************
Botman
 **************/
Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
