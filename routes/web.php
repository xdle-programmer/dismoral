<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('index');
});


Route::get('occupant/item/{orc}', [Controllers\OrcController::class, 'orcInfo']);
Route::get('occupant/find', [Controllers\OrcController::class, 'orcInfo'])->name('find');
Route::get('occupant/send', [Controllers\OrcController::class, 'orcInfo'])->name('send');


Route::get('occupant/send-item', function () {
    return view('send');
});
