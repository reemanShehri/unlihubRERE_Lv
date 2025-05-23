<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\showUsersController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Post2Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\User\Course2Controller;
use App\Http\Controllers\StudentDetailController;
use App\Http\Controllers\User\Comment2Controller;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


use App\Http\Controllers\User\Lecture2Controller;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\Admin\UniversityController;

Route::post('/ask', [ChatGPTController::class, 'askToChatGPT']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::patch('/profile/extra', [ProfileController::class, 'updateExtra'])->name('profile.update.extra');

//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     //student
//     Route::get('/student-details/create', [StudentDetailController::class, 'create'])->name('student-details.create');
//     Route::post('/student-details', [StudentDetailController::class, 'store'])->name('student-details.store');


// });

Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    Route::get('/courses', [Course2Controller::class, 'index'])->name('user.courses.index');
    Route::post('/courses/register', [Course2Controller::class, 'register'])->name('user.courses.register');
    Route::delete('user/courses/unregister', [Course2Controller::class, 'unregister'])->name('user.courses.unregister');
    Route::get('/courses/{course}/lectures', [Lecture2Controller::class, 'index'])->name('user.courses.lectures');



});



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

    //

    Route::get('/chatboard', [Post2Controller::class, 'index'])->name('chatboard.index');
    Route::post('/posts', [Post2Controller::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/comments', [Comment2Controller::class, 'storeC'])->name('comments.store');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');


    Route::get('/settings', [SettingsController::class, 'index'])->name('user.settings.index');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');




    Route::get('user/profile', [User2Controller::class, 'edit'])->name('user.profile.edit');
    Route::patch('user/profile/update', [User2Controller::class, 'update'])->name('user.profile.update');


    Route::post('/comments/{comment}/like', [CommentLikeController::class, 'toggleLike'])->name('comments.toggleLike');

    Route::post('/comments/{comment}/replies', [ReplyController::class, 'store'])->name('replies.store');


    Route::get('/my-posts', [ Post2Controller::class, 'myPosts'])->name('posts.mine');
    // routes/web.php
Route::get('/posts/{post}/edit', [Post2Controller::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [Post2Controller::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [Post2Controller::class, 'destroy'])->name('posts.destroy');



Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.markAsRead')
    ->middleware('auth');




Route::get('/users', [showUsersController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [showUsersController::class, 'show'])->name('users.show');

Route::post('/users/search', [showUsersController::class, 'search'])->name('users.search');

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



Route::get('/chat', [ChatGPTController::class, 'showChatPage']);


Route::post('/chat', [ChatGPTController::class, 'chat']);






use App\Models\Message;


Route::post('/save-message', function(Request $request) {
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'message' => 'required|string'
    ]);

    $user = User::find($request->user_id);

    Message::create([
        'user_id' => $user->id,
        'email' => $user->email,
        'message' => $request->message
    ]);

    return response()->json(['status' => 'saved', 'email' => $user->email]);
});


require __DIR__.'/auth.php';
