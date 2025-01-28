<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DocsController;

Route::get('/', [DocsController::class, 'index']);
