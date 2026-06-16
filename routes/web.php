<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/allNotes', NotesController::class);
});

require __DIR__ . '/settings.php';
