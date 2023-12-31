<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
    Route::get('create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('store', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('{id}/edit' ,[TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('{id}/update' ,[TasksController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{id}' ,[TasksController::class, 'destroy'])->name('tasks.delete');
    
    Route::resource('projects', ProjectsController::class);

});


Auth::routes();

// Route::get('/', [AuthController::class,'show'])->name('login');
// Route::post('/', [AuthController::class,'login']);
// Route::post('logout' , [AuthController::class,'logout'])->name('logout');