<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return view('common.master');
})->middleware(['auth', 'verified'])->name('master');

Route::controller(UserController::class)->middleware(['auth','verified'])->group(function () {
    Route::get('/profile','profile')->name('profile');
    Route::get('/profile/edit','edit')->name('profile.edit');
    Route::post('/profile/update','update')->name('profile.update');
    Route::get('/password/edit','editPass')->name('password.edit');
    Route::post('/password/update1','updatePass')->name('password.update1');

    Route::get('/page/logout','logoutPage')->name('page.logout');
});
require __DIR__.'/auth.php';

Route::controller(TaskController::class)->middleware(['auth','verified'])->group(function () {
    Route::get('/task','task')->name('task');
    Route::post('/task/create','taskCreate')->name('task.create');
    Route::get('/allTask','allTask')->name('task.all');
    Route::get('/task/edit/{id}','taskEdit')->name('task.edit');
    Route::post('/task/update/{id}','taskUpdate')->name('task.update');
    Route::get('/task/destroy/{id}','taskDestroy')->name('task.destroy');
});