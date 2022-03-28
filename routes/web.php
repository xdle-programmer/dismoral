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

//Главная страница и страница списка
Route::get('/', [Controllers\OrcController::class, 'orcList'])->name('list');
Route::get('list', [Controllers\OrcController::class, 'orcList'])->name('list');

//Страница оккупанта
Route::get('occupant/item/{orc}', [Controllers\OrcController::class, 'orcInfo']);

//Пост запрос для сохранения ссылок
Route::post('occupant/item/{orc}/add-data', [Controllers\OrcController::class, 'saveOrc']);

//Пост запрос для отметки "Написал"
Route::post('occupant/item/{orc}/check', [Controllers\OrcController::class, 'ocrCheck'])->name('check');

//Ссылка для редиректа первого орка, которого нужно найти
Route::get('occupant/find', [Controllers\OrcController::class, 'findOrcDoesntHaveData'])->name('find');

//Ссылка для редиректа первого орка, которому нужно написать
Route::get('occupant/send', [Controllers\OrcController::class, 'findOrcDoesntHaveSend'])->name('send');




