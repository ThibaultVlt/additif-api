<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdditifController;

Route::post('/additifs/somme_toxicite', [AdditifController::class, 'sommeToxicite']);
