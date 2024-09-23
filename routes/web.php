<?php

use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/dashboard/remunerados', function() {
        return Inertia::render('DashboardRemunerados');
    })->name('dashboard.remunerados');
    
    Route::get('/dashboard/voluntarios', function() {
        return Inertia::render('DashboardVoluntarios');
    })->name('dashboard.voluntarios');

    Route::resource('posts', App\Http\Controllers\PostController::class)->except('create');
    Route::resource('tags', App\Http\Controllers\TagController::class);


});

Route::get("/dashboard-admin", function () {
    return Inertia::render('DashboardAdmin');
})->name("dashboard-admin");

Route::get('/user/{user_id}', function ($user_id) {
    return Inertia::render('User', ['user_id' => $user_id]);
})->name('user');
Route::post("/filter-posts", [App\Http\Controllers\PostController::class, 'filter'])->name('filter-posts');
Route::get('/list-posts/remunerados', [App\Http\Controllers\PostController::class, 'filterPayed'])->name('list-posts.remunerados');
Route::get('/list-posts/voluntarios', [App\Http\Controllers\PostController::class, 'filterVolunteers'])->name('list-posts.voluntarios');

Route::resource('skills', SkillController::class);
Route::get('/users/skill/{skill}', [UserController::class, 'filterBySkill'])->name('users.skill');
Route::get('/users/{name}', [UserController::class, 'findByName'])->name('users.name');
Route::post('/users/{user_id}/skills', [UserController::class, 'attachSkill'])->name('users.skills.store');
Route::get('/user/{user_id}/profile', [UserController::class, 'profile'])->name('user.profile');

