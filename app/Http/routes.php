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


/* anuncios routes */


Route::get('anuncie', 'HomeController@anuncie');

Route::post('anuncie','AdvertController@store');



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

Route::get('search-cidade/{query?}',[
    'uses'=> 'HomeController@searchCidade'
]);

Route::get('search-imoveis/{query?}',[
    'uses' => 'HomeController@scopeImoveis'

]);

Route::get('/consultar_cep','HomeController@searchCep');

Route::get('testes',[
    'uses' => 'HomeController@testeImoveis'
]);







Route::get('anuncio','HomeController@searchAnuncio');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);




//Controlador para o login
Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware'=>'auth','where'=>['id'=>'[0-9]+']], function()
{

    Route::group(['prefix' => 'home'],function(){

        Route::get('/',['as'=>'home', 'uses'=> 'AdminController@home']);


    });

    Route::group(['prefix' => 'usuarios'],function() {

        Route::get('/',['as'=>'usuarios', 'uses' => 'UserController@index']);

    });

    Route::group(['prefix' => 'anuncios'],function() {

        Route::get('/',['as'=>'anuncios', 'uses' => 'AdvertController@index']);

    });


});

Route::get('/{url_name?}', 'HomeController@tipocategoria');

Route::get('anuncio/{tipo_anuncio}/{id}/{url_anuncio}',[
    'uses' => "HomeController@anuncioInterno"


]);

//procura cep


