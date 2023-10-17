<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/content', [ContentController::class, 'showContent'])->name('content');
Route::get('/ticket', [OrderController::class, 'listTickets'])->name('ticket');
Route::post('/ticket', [OrderController::class, 'orderTicket'])->name('order');
Route::get('ticket/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::delete('/cancel/{order}', [OrderController::class, 'cancelOrder'])->name('cancel');
Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');
