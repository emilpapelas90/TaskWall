<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertiserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [PublisherController::class, 'dashboard'])->middleware(['verified'])->name('dashboard');

        Route::get('/placements', [PublisherController::class, 'placements'])->name('placements');
        Route::get('/placement/create', [PublisherController::class, 'create'])->name('placement.create');
        Route::post('/placement_add', [PublisherController::class, 'add_placement'])->name('placement.add');

        Route::get('/placement/{id}/edit', [PublisherController::class, 'edit'])->name('placement.create');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::middleware('auth')->group(function () {

        Route::get('/advertiser/dashboard', [AdvertiserController::class, 'dashboard'])->name('ad_dashboard');

        Route::get('/advertiser/tasks', [AdvertiserController::class, 'tasks'])->name('tasks');
        Route::get('/advertiser/task/create', [AdvertiserController::class, 'create'])->name('task.create');

        Route::get('/advertiser/task/submit', [AdvertiserController::class, 'submit'])->name('task.submit');

        Route::post('/advertiser/task_add', [AdvertiserController::class, 'add_task'])->name('task.add');

        Route::get('/advertiser/task/{id}/edit', [AdvertiserController::class, 'edit'])->name('task.edit');
        Route::patch('/advertiser/task/{id}/update', [AdvertiserController::class, 'update'])->name('task.update');

        Route::delete('/advertiser/task/{id}/delete', [AdvertiserController::class, 'destroy'])->name('task.destroy');
     });

    require __DIR__.'/auth.php';
});
