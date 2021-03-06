<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthorization;
use App\Http\Controllers\Api\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('person', function() {
    return \App\Models\User::find(1);
});

Route::middleware(ApiAuthorization::class)->group(function () {
    Route::post('question', [Controller::class, 'create']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
