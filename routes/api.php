<?php

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

Route::post('/option', function () {
    return ('welcome');
})->middleware('Chandler');
Route::get('/get', function () {
    return ('welcome');
})->middleware('Chandler');
Route::get('/get1', function () {
    return ('welcome');
})->middleware('Chandler');

Route::get('/get2', function () {
    return ('welcome');
})->middleware('Chandler');

Route::post('/post', function () {
    return ('welcome');
})->middleware('Chandler');
Route::post('/post1', function () {
    return ('welcome');
})->middleware('Chandler');
Route::post('/post2', function () {
    return ('welcome');
})->middleware('Chandler');
Route::post('/post3', function () {
    return ('welcome');
})->middleware('Chandler');
