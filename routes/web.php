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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\Admin\UniversityController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::patch('/profile/extra', [ProfileController::class, 'updateExtra'])->name('profile.update.extra');

//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     //student
//     Route::get('/student-details/create', [StudentDetailController::class, 'create'])->name('student-details.create');
//     Route::post('/student-details', [StudentDetailController::class, 'store'])->name('student-details.store');


// });


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Academic info routes
    Route::get('/student-details/create', [StudentDetailController::class, 'create'])->name('student-details.create');
    Route::post('/student-details', [StudentDetailController::class, 'store'])->name('student-details.store');
    Route::get('/student-details/edit', [StudentDetailController::class, 'edit'])->name('student-details.edit');
    Route::put('/student-details/update', [StudentDetailController::class, 'update'])->name('student-details.update');
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
