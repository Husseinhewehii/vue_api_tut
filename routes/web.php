<?php

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
    return view('welcome');
});

Route::get('/vue-test', function () {
    return view('vue_test');
});

Route::get('/vue-test-2', function () {
    return view('vue_test_2');
});

Route::get('/vue-test-3', function () {
    return view('vue_test_3');
});

Route::get('/vue-test-4', function () {
    return view('vue_test_4');
});

Route::get('/vue-test-5', function () {
    return view('vue_test_5');
});

Route::get('/vue-test-6', function () {
    return view('vue_test_6');
});

Route::get('/vue-test-7', function () {
    return view('vue_test_7');
});

Route::get('/projects/{projects}','ProjectController@create')->name('create_project');