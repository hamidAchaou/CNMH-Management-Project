<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * // project
 * */

Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

/**
 * Tasks 
 * */
Route::prefix('tasks')->group(function () {
    
    Route::get('/{id}/show', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/{id}/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/{id}/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
});
