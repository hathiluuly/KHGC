<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;



Route::get('/welcome', function () {
    Mail::to('aliulyday@gmail.com')
    ->send(new HelloMail());
});


Route::get('/hovaten', function(){
    return view('User.home');
})->name('hovaten');


Route::get('/register', [RegisterController::class,'showRegister'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

Route::get('/login', [LoginController::class,'showLogin'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('post-login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forget-password', [ForgotPasswordController::class,'showForgetPassword'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('post-forgetpass');

Route::get('/reset-password/{token}', [ResetController::class, 'showResetPassword'])->name('reset-password');
Route::post('/reset-password', [ResetController::class, 'resetPassword'])->name('post-resetpassword');

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/trangchu', [HomeController::class, 'index'])->name('trangchu');

    Route::get('/profile',[HomeController::class, 'profile'])->name('profile');
    Route::post('/profile',[HomeController::class, 'checkProfile'])->name('update-profile');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');

    // Hiển thị form tạo mới bài viết
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    // Lưu bài viết mới
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    // Hiển thị chi tiết bài viết
    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

    // Hiển thị form cập nhật bài viết
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');

    // Cập nhật bài viết có ID cụ thể
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');

    Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

    Route::delete('post/post/{id}', [PostController::class,'deleteAll'])->name('post.deleteAll');
});


