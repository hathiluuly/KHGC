<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NewsController;



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

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');

    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');

    Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

    Route::delete('post/post/{id}', [PostController::class,'deleteAll'])->name('post.deleteAll');

    Route::get('/news', [NewsController::class, 'index'])->name('post.all');
    Route::get('/news/{slug}', [NewsController::class, 'showBySlug'])->name('show.post');

});


// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
// Route::get('/post', [PostController::class, 'index'])->name('admin.post');
// Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
// Route::get('/user/edit/{users}', [AdminController::class, 'user_edit'])->name('admin.edit');
// Route::post('/user/edit/{users}', [AdminController::class, 'user_update']);
// Route::get('/post/edit', [AdminController::class, 'edit'])->name('admin.post.edit');
