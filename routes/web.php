<?php

use App\Http\Controllers\EventWebinarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PromotionController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/webinar/{id}/absent', [WebinarController::class, 'absent'])->name('webinar.absent');
    Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar.index');
    Route::get('/webinar/create', [WebinarController::class, 'create'])->name('webinar.create');
    Route::post('/webinar/store', [WebinarController::class, 'store'])->name('webinar.store');
    Route::patch('/webinar/{id}/update-link', [WebinarController::class, 'updateLink'])->name('webinar.update-link');
    Route::get('/webinar/{id}/url', [WebinarController::class, 'getUrl'])->name('webinar.url');
    Route::post('/webinar/{id}/absent', [WebinarController::class, 'absentStore'])->name('webinar.absent');

    Route::get('/events', [EventWebinarController::class, 'index'])->name('events.index');
    Route::get('/events/history', [EventWebinarController::class, 'history'])->name('events.history');
    Route::get('/events/{id}', [EventWebinarController::class, 'show'])->name('events.show');
    Route::get('/events/{id}/register', [EventWebinarController::class, 'register'])->name('events.register');
    Route::post('/events/{id}/payment', [EventWebinarController::class, 'payment'])->name('events.payment');
    Route::get('/events/{id}/detail-history', [EventWebinarController::class, 'showHistory'])->name('events.history-detail');
    Route::post('/events/{id}/question', [EventWebinarController::class, 'addQuestion'])->name('questions.store');
    Route::post('/events/{id}/like', [EventWebinarController::class, 'setLike'])->name('questions.like');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
