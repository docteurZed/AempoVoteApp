<?php

use App\Http\Controllers\Member\VoteController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\CandidateController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
Route::get('/candidats', [CandidateController::class, 'index'])->name('candidate');
Route::get('/candidat-{id}/detail', [CandidateController::class, 'show'])->name('candidate.detail');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('member')->name('member.')->group(function () {
        Route::get('vote', [VoteController::class, 'index'])->name('vote');
        Route::post('vote', [VoteController::class, 'store'])->name('vote.store');
    });
    
});

require __DIR__.'/auth.php';
