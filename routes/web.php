<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('welcome');

Route::get('/format', [PublicController::class, 'form'])->name('format');

Route::get('/image-gen', [PublicController::class, 'imageGen'])->name('imageGen');
