<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\AboutController;

Route::get(uri:'/', action: [AuthManagerController::class, 'login'])->name('login');
Route::post(uri:'/', action: [AuthManagerController::class, 'loginPost'])->name('loginPost');
Route::get(uri:'/register', action: [AuthManagerController::class, 'register'])->name('register');
Route::post(uri:'/register', action: [AuthManagerController::class, 'registerPost'])->name('registerPost');
Route::get(uri:'/about', action: [AboutController::class, 'about'])->name('about');
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/about', [AboutController::class, 'about'])->name('about');
});
// Route::get('/', function () {
//     return view('welcome', ['name' => 'World']);
// });
