<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\QueueController;

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

Route::resource('ticket', TicketController::class);
Route::resource('queue', QueueController::class);
Route::get('queue/{queue}/tickets', [QueueController::class, 'tickets'])->name('queue.tickets');

Route::get('/', function () {
  return redirect()->route('queue.index');
});