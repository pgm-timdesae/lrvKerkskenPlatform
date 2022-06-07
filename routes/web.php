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

//Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
//Homepage
Route::get('/', [PagesController::class, 'index']);

// Documents
Route::get('/documents', [PagesController::class, 'documents']);

//Chatbot
Route::get('/chatbot', [PagesController::class, 'chatbot']);


// Events
//Route::get('events/{id}', [EventsController::class, 'show']);
Route::resource('/events', EventsController::class);
Route::get('/events/past', [EventsController::class, 'past']);

// Users
Route::resource('/users', UsersController::class);

// Documents
Route::resource('/files', FilesController::class);

// Documents
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

//Route::match(['get', 'post'], '/chatbot', [BotmanController::class . 'enterRequest']);

//Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
