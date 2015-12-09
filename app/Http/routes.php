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


Route::get('/', function(){
   return view('layout');
});

Route::get('/', [

    'uses' => 'HomeController@index'
]);


/* imoveis routes */
Route::get('imoveis', 'HomeController@imoveis');

Route::get('anuncie', 'HomeController@anuncie');

Route::post('anuncie','AdvertController@store');

Route::get('imovel/{id}/{url_anuncio}',[
    'uses' => "HomeController@imovelInterno"


]);

Route::get('anuncie',[

   'uses' => 'HomeController@anuncieCategoria'
]);

Route::get('/ajax-subcat',[

   'uses' => 'HomeController@getCategories'
]);

/* rotas ajax */

Route::get('/ajax-advcat',[

    'uses' => 'HomeController@getAdvSub'
]);

Route::get('testes',[
    'uses' => 'HomeController@testes'


]);

/* Rotas login facebook */
Route::get('auth/facebook/', 'SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'SocialController@handleProviderCallback');


//Controlador para o login


Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);