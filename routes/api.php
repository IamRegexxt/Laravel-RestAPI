<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('users', 'display_all_users');
    Route::post('user/{id}', 'display_one_user');
    Route::put('user/{id}', 'update_user');
    Route::delete('user/{id}', 'delete_user');

    

});
Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});
Route::controller(ElectionController::class)->group(function () {
    Route::get('elections', 'display_elections_list');
    Route::post('election', 'create_election');
    Route::post('election/{id}', 'display_one_election');

    Route::put('election/{id}', 'update_election');
    Route::delete('election/{id}', 'delete_election');

});
Route::controller(PositionController::class)->group(function () {
    Route::get('positions', 'display_positions_list');
    Route::post('position', 'create_position');
    Route::post('position/{id}', 'display_one_position');
    Route::put('position/{id}', 'update_position');
    Route::delete('position/{id}', 'delete_position');

});
Route::controller(CandidateController::class)->group(function () {
    Route::get('candidates', 'display_candidates_list');
    Route::post('candidate', 'create_candidate');
    Route::post('candidate/{id}', 'display_one_candidate');
    Route::put('candidate/{id}', 'update_candidate');
    Route::delete('candidate/{id}', 'delete_candidate');

});
