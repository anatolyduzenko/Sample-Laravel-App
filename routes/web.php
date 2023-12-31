<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RabbitMQTestController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('file-manager', App\Http\Controllers\FileManagerController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rabbitmq', [RabbitMQTestController::class, 'index'])->name('rabbitmq.index');
    Route::post('/rabbitmq/send', [RabbitMQTestController::class, 'send_message'])->name('rabbitmq.create');
});

require __DIR__.'/auth.php';
