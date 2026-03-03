<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact.submit');
Route::get('/download-cv', [PortfolioController::class, 'downloadCV'])->name('cv.download');

// Portfolio Pages
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project:slug}', [PortfolioController::class, 'projectDetail'])->name('projects.detail');

Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience.index');
Route::get('/experience/{experience:slug}', [PortfolioController::class, 'experienceDetail'])->name('experience.detail');

Route::get('/certificates', [PortfolioController::class, 'certificates'])->name('certificates.index');
Route::get('/certificates/download/{certificate}', [PortfolioController::class, 'downloadCertificate'])->name('certificates.download');
Route::get('/certificates/{certificate:slug}', [PortfolioController::class, 'certificateDetail'])->name('certificates.detail');

Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
