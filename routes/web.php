<?php

use App\Core\Repositories\Interfaces\NoteRepository;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index']);
Route::post('/', [NoteController::class, 'create']);
Route::delete('/{id}', [NoteController::class, 'delete']);
