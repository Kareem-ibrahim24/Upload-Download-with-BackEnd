<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// all routes
Route::get('files', "FileController@index")->name('file.index');
Route::get('file/create', "FileController@create")->name('file.create');
Route::post('file/store', "FileController@store")->name('file.store');
Route::get('file/edit/{id}', "FileController@edit")->name('file.edit');
Route::get('file/show/{id}', "FileController@show")->name('file.show');
Route::get('file/download/{id}', "FileController@download")->name('file.download');
Route::post('file/edit/{id}', "FileController@update")->name('file.update');
Route::get('file/delete/{id}', "FileController@destroy")->name('file.destroy');
