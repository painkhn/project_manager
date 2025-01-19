<?php

use App\Http\Controllers\{ ProfileController, ProjectController };
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile/update', 'update')->name('profile.update');
        Route::get('/profile/destroy', 'destroy')->name('profile.destroy');
        Route::get('/profile/edit/{id}', 'edit')->name('profile.edit');
        Route::get('/profile/schedule/{id}', 'schedule')->name('profile.schedule');
        Route::get('/profile/projects/{id}', 'projects')->name('profile.projects');
        Route::get('/profile/{id}', 'index')->name('profile.index');
    });
    Route::controller(ProjectController::class)->group(function() {
        Route::get('/project/create', 'create')->name('project.create');
        Route::post('/project/store', 'store')->name('project.store');
        Route::get('/project/{id}', 'index')->name('project.index');
    });
});



require __DIR__.'/auth.php';
