<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UniversityController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php
Route::middleware(['auth', IsAdmin::class])
->prefix('admin')
->name('admin.')
->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin');

     Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
     Route::resource('universities', UniversityController::class);
     Route::resource('students', StudentController::class);
     Route::resource('colleges', CollegeController::class);
        Route::resource('majors', MajorController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('users', UserController::class);
        Route::resource('posts', PostController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('lectures', LectureController::class);
        Route::resource('files', FileController::class);

    });





// traceee
Route::middleware('auth', IsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admins', [AdminController::class, 'showAdmins'])->name('admins.index');
    Route::delete('/admins/{user}', [AdminController::class, 'destroyAdmin'])->name('admins.destroy');
    Route::put('/admins/{user}/demote', [AdminController::class, 'demoteAdmin'])->name('admins.demote');
    Route::get('/admins/create', [AdminController::class, 'createAdmin'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'storeAdmin'])->name('admins.store');

    Route::get('/admins/{user}/edit', [AdminController::class, 'editAdmin'])->name('admins.edit');
    Route::put('/admins/{user}', [AdminController::class, 'updateAdmin'])->name('admins.update');
});


require __DIR__.'/auth.php';
