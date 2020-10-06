<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpeakerController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:chat|admin']], function () {
    Route::get('chat', [ChatsController::class, 'index']);
    Route::get('messages', [ChatsController::class, 'fetchMessages']);
    Route::post('messages', [ChatsController::class, 'sendMessage']);
});

Route::get('/', [QuestionController::class, 'index'])->name('index');
Route::post('/question/{id?}', [QuestionController::class, 'question'])->where('id', '[0-9]+');
Route::post('/question/store', [QuestionController::class, 'store']);
Route::post('/question/accept', [QuestionController::class, 'accept']);
Route::post('/question/delete', [QuestionController::class, 'delete']);
Route::post('/question/accepted', [QuestionController::class, 'questionAccepted']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'list'])->name('adminPanel');
});

Route::group(['middleware' => ['role:speaker']], function () {
    Route::get('/speaker', [SpeakerController::class, 'list'])->name('speakerPanel');
});
