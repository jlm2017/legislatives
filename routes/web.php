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

/**
 * Get the form and map to choose departement or circonscription
 */
Route::get('/circonscriptions', 'CirconscriptionController@map');

/**
 * Get 1 circonscription by departement and circonscription
 */
Route::get('/departement/{dep}/circonscription/{circo}', 'CirconscriptionController@show')->where(['dep' => '[0-9]+', 'circo' => '[0-9]+']);

/**
 * Get form to edit circonscription
 */
Route::get('/departement/{dep}/circonscription/{circo}/edit', 'CirconscriptionController@edit')->where(['dep' => '[0-9]+', 'circo' => '[0-9]+']);

/**
 * Update circonscription with form by post
 */
 Route::post('/departement/{dep}/circonscription/{circo}/edit', 'CirconscriptionController@update')->where(['dep' => '[0-9]+', 'circo' => '[0-9]+']);

/**
 * Get the form to upload a csv file
 */
Route::get('/circonscriptions/create', 'CirconscriptionController@create');

/**
 * Post the form to import csv file in database and create or update circonscription(s)
 */
Route::post('/circonscriptions/create', 'CirconscriptionController@store');
