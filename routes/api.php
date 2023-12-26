<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Register Page Api
Route::post('add_register_page', [App\Http\Controllers\API\Campaign_IdeasController::class, 'register_page'])->name('add-register-page');

Route::post('test_add_register_page', [App\Http\Controllers\API\Campaign_IdeasController::class, 'test_add_register_page'])->name('test-add-register-page');


Route::get('answer_get', [App\Http\Controllers\API\Campaign_IdeasController::class, 'answer_get'])->name('answer-get');
Route::post('answer_add_register_page', [App\Http\Controllers\API\Campaign_IdeasController::class, 'answer_add_register_page'])->name('answer-add-register-page');

Route::post('answer_add_question', [App\Http\Controllers\API\Campaign_IdeasController::class, 'answer_add_question'])->name('answer-add-question');

Route::get('campaign_idea_details', [App\Http\Controllers\API\Campaign_IdeasController::class, 'campaign_idea_details'])->name('campaign-idea-details');
