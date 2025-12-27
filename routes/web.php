<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// ROUTE PUBLIC (TANPA LOGIN)
// ==========================

// Login
Route::get('/', 'AuthController@login')->name('login');
Route::post('/ceklogin', 'AuthController@cekLogin');

// User (tanpa login)
Route::get('/search','UserController@search');
Route::get('/hasil','UserController@hasil');


// ==========================
// ROUTE ADMIN (WAJIB LOGIN)
// ==========================
Route::group(['middleware' => ['auth']], function () {

    // Dashboard
    Route::get('/home', 'PageController@home');

    // BARANG
    Route::get('/barang', 'PageController@barang');
    Route::get('/barang/addform', 'PageController@getform');
    Route::post('/barang/addData', 'PageController@addData');
    Route::get('/barang/editForm/{id}', 'PageController@editdatabarang');
    Route::put('/barang/saveEdit/{id}', 'PageController@saveEditBarang');
    Route::get('/barang/deleteBarang/{id}', 'PageController@deleteBarang');

    // EXPORT
    Route::get('/barang/export/pdf', 'BarangExportController@exportPDF');
    Route::get('/barang/export/excel', 'BarangExportController@exportExcel');

    // USERS
    Route::get('/users', 'UserController@dataUsers');
    Route::get('/users/userForm', 'UserController@formUser');
    Route::post('/users/addData', 'UserController@addUser');
    Route::get('/users/deleteUsers/{id}', 'UserController@deleteUsers');

    // PASSWORD & LOGOUT
    Route::get('/changepass','AuthController@editpass');
    Route::post('/save-pass', 'PageController@updatepass');
    Route::get('/logout','AuthController@logout');
});
