<?php

use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('auth.register');
})->name('home');

// Route::post('/register', [RegisterController::class,'index'])->name('register.index');
Route::post('/register', [RegisterController::class,'index'])->name('register.index');
Route::post('/generate', [RegisterController::class,'generate_otp'])->name('generate.otp');
Route::post('/check', [RegisterController::class,'check_otp'])->name('check.otp');
