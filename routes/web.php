<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/subscriptions', SubscriptionController::class)->name('subscriptions');
Route::post('/search', SearchController::class)->name('search');

Route::get('/dashboard', function () {
	return Inertia::render('Dashboard', [
		'title' => 'Статус',
	]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	Route::resource('videos', VideoController::class);
});

require __DIR__ . '/auth.php';
