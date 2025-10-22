<?php

use App\Http\Controllers\Admin\UserImportController;
use App\Http\Controllers\Candidate\CandidatePersonalInfoController;
use App\Http\Controllers\Candidate\DashboardController;
use App\Http\Controllers\Member\VoteController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\CandidateController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
Route::get('/candidats', [CandidateController::class, 'index'])->name('candidate');
Route::get('/candidat-{id}/detail', [CandidateController::class, 'show'])->name('candidate.detail');

Route::middleware(['auth'])->group(function () {

    Route::prefix('membre')->name('member.')->group(function () {
        Route::get('/vote', [VoteController::class, 'index'])->name('vote');
        Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    });

    Route::prefix('candidat')->name('candidat.')->group(function () {
        Route::get('/tableau-de-bord', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/infos-personnels', [CandidatePersonalInfoController::class, 'index'])->name('infos');
        Route::get('/programme-vote', [CandidatePersonalInfoController::class, 'voteInfoEdit'])->name('vote');
        Route::get('/reseaux-sociaux', [CandidatePersonalInfoController::class, 'socialMediaEdit'])->name('media');
        Route::put('/infos-personnels', [CandidatePersonalInfoController::class, 'updatePersonalInfo'])->name('infos.update');
        Route::put('/reseaux-sociaux', [CandidatePersonalInfoController::class, 'updateSocialMedia'])->name('media.update');
        Route::put('/programme-vote', [CandidatePersonalInfoController::class, 'updateVoteInfo'])->name('vote.update');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/import-users', [UserImportController::class, 'index'])->name('import.index');
        Route::post('/import-users', [UserImportController::class, 'store'])->name('import.store');
    });
});

require __DIR__ . '/auth.php';
