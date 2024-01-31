<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;



Route::get('/welcome', function () {
    Mail::to('aliulyday@gmail.com')
    ->send(new HelloMail());
});


Route::get('/dashboard', function(){
    return view('home');
})->name('dashboard');


Route::get('/register', [RegisterController::class,'showRegister'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

Route::get('/login', [LoginController::class,'showLogin'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('post-login');


Route::controller(ForgetPasswordController::class)->group(function(){
    Route::get('/forget-password', 'showForgetPassword')->name('forget-password');
    Route::post('/forget-password', 'forgetPassword')->name('post-forgetpass');
    Route::get('/reset-password/{token}', 'showResetPassword')->name('reset-password');
    Route::post('/reset-password', 'resetPassword')->name('post-resetpassword');
    
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

