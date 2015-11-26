<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');


/* imoveis routes */
Route::get('imoveis', 'HomeController@imoveis');

Route::get('anuncie', 'HomeController@anuncie');

Route::post('anuncie','AnuncioController@store');

Route::get('imoveis/1/teste',[
    'uses' => "HomeController@imovelInterno"


]);

Route::get('anuncie',[

   'uses' => 'HomeController@anuncieCategoria'
]);

Route::get('/ajax-subcat',[

   'uses' => 'HomeController@getCategories'
]);

Route::get('/ajax-advcat',[

    'uses' => 'HomeController@getAdvSub'
]);

Route::get('teste',[
    'uses' => 'HomeController@testes'


]);

/* Rotas login facebook */
Route::get('auth/facebook', 'SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'SocialController@handleProviderCallback');


//Controlador para o login



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);