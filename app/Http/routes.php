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
/* rotas ajax */

Route::post('/get-contadortel','HomeController@contadorTelefone');

Route::post('/get-contadorFinanciamento','HomeController@contadorFinanciamento');

Route::post('/form-denuncia', 'HomeController@denuncia');
Route::post('/form-amigo', 'HomeController@formAmigo');
Route::post('/form-message', 'HomeController@formContato');
Route::post('/form-pagamento','HomeController@formPagamento');


//rotas parceria, contato

Route::get('parcerias','HomeController@parceriaTela');
Route::get('contato','HomeController@contato');
Route::post('enviar/contato',['as'=> 'contato.form','uses' => 'HomeController@contatoEnvio']);

Route::get('seja-parceiro','HomeController@sejaParceiro');
Route::post('enviar/parceiro',['as'=> 'parceiro.form','uses' => 'HomeController@parceiroEnvio']);

Route::get('testeImagem','HomeController@imagemDestaque');


// Rotas para solicitar trocar de senha...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Rotas para trocar a senha...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('/email',[
    'uses' => 'HomeController@sendEmailTest'

]);

Route::get('/', [

    'uses' => 'HomeController@index'
]);

//url pagamento

/*Route::post('/payment', 'PaymentController@pay');*/


/* anuncios routes */
Route::group(['middleware'=>'auth'], function() {


    Route::get('anuncie', 'HomeController@anuncie');
    Route::post('anuncie','AdvertController@store');
    Route::get('anuncie',[

        'uses' => 'HomeController@anuncieCategoria'
    ]);

    Route::get('pagamento',[
        'uses' => 'HomeController@pagamento'
    ]);

    Route::get('plano/{id?}',[
        'uses' => 'HomeController@tipoPlano'
    ]);
    Route::post('/payment/{id}', ['as' => 'adquirir' , 'uses' => 'PaymentController@pay']);
    Route::get('/payment/{id}', ['as' => 'adquirir' , 'uses' => 'PaymentController@pay']);

});

Route::get('planos', 'HomeController@telaPlano' );

/*
Route::get('anuncie', 'HomeController@anuncie');
Route::post('anuncie','AdvertController@store');
Route::get('anuncie',[

    'uses' => 'HomeController@anuncieCategoria'
]);
*/


Route::get('login','HomeController@loginTela');


Route::get('/ajax-subcat',[

    'uses' => 'HomeController@getCategories'
]);


Route::get('/ajax-advcat',[

    'uses' => 'HomeController@getAdvSub'
]);

Route::get('/get-marcatotal',[
    'uses'=> 'HomeController@getMarcaTotal'
]);

Route::get('/get-marca',[
    'uses'=> 'HomeController@getMarca'
]);

Route::get('/get-veiculos', 'AdminController@getVeiculo');

Route::get('/get-modelo',[
    'uses'=> 'HomeController@getModelo'
]);

Route::get('search-cidade/{query?}',[
    'uses'=> 'HomeController@searchCidade'
]);
Route::get('search-bairro/{query?}',[
    'uses'=> 'HomeController@searchBairro'
]);

Route::get('search-imoveis',[
    'uses' => 'HomeController@scopeImoveis'

]);

Route::get('search-veiculos',[
    'uses' => 'HomeController@scopeVeiculos'

]);


Route::get('sem-imagem', 'HomeController@noImage');
Route::get('/consultar_cep','HomeController@searchCep');

//Route::get('anuncio','HomeController@searchAnuncio');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);

Route::get('/{name_url}', 'HomeController@searchAnuncio');

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
        Route::get('/editar/{id}',['as'=>'admin.usuarios.edit', 'uses' => 'UserController@edit']);
        Route::get('/update/{id}',['as'=>'usuarios.update', 'uses' => 'UserController@update']);
    });

    Route::group(['prefix' => 'perfil'],function(){
        Route::get('/',['as'=> 'perfil','uses' => 'PerfilController@index']);
    });

    Route::group(['prefix' => 'anuncios'],function() {

        Route::get('/',['as'=>'anuncios', 'uses' => 'AdvertController@index']);
        Route::post('/update/{id}',['as'=>'admin.anuncios.update', 'uses' => 'AdvertController@update']);
        Route::get('{id}/edit',['as'=>'admin.anuncios.edit','uses'=>'AdvertController@edit']);
        Route::get('destroy/{id}',['as'=> 'anuncios.destroy','uses' => 'AdvertController@destroy'  ]);
        Route::get('destroy-image/{id}','AdvertController@destroyOneImage');
        Route::get('capa-image/{id}','AdvertController@capaImagem');
        //Route::get('destroy/{id}/image',['as'=>'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
        Route::post('create-image/upload', ['as' => 'anuncios.image', 'uses' => 'AdminController@create']);
        Route::post('upload/{id}', ['as' => 'adverts.images.store', 'uses' =>'AdvertController@postUpload']);


    });

    Route::group(['prefix' => 'mensagens'],function() {

        Route::get('/',['as'=>'mensagens', 'uses' => 'MessageController@index']);
        Route::get('message/view/{id}',['as'=>'message.view','uses'=> 'MessageController@view' ]);
        Route::get('message/destroy/{id}',['as'=>'message.destroy', 'uses' => 'MessageController@destroy']);
    });

    Route::group(['prefix' => 'adm'],function() {

        Route::get('/',['as'=>'adm', 'uses' => 'AdminController@dadosPainelAdm']);

        Route::get('/anuncios',['as'=>'adm.anuncios', 'uses' => 'AdminController@anunciosSemImg']);
        Route::get('/xml',['as'=>'adm.xml', 'uses' => 'AdminController@lerXML']);
        Route::get('/deluser',['as'=>'adm.deluser', 'uses' => 'AdminController@usuariosSemAnuncio']);


    });

    Route::group(['prefix' => 'leads'],function() {

        Route::get('/',['as'=>'leads', 'uses' => 'AdminController@mostrarLeads']);
        Route::get('{id}/edit',['as'=>'admin.leads.edit','uses'=>'AdminController@edit']);
        Route::get('/novo',['as'=>'admin.leads.novo','uses'=>'AdminController@novo']);
        Route::post('/salvarlead',['as'=>'admin.leads.salvarlead','uses'=>'AdminController@store']);
        Route::post('/editarlead',['as'=>'admin.leads.editarlead','uses'=>'AdminController@editLead']);
        Route::post('/salvarleadhistorico',['as'=>'admin.leads.salvarleadhistorico','uses'=>'AdminController@addHistoricoLead']);
        Route::get('{id}/{idLead}/inativarleadhistorico',['as'=>'admin.leads.inativarhistorico','uses'=>'AdminController@inativarHistoricoLead']);

    });

});


Route::get('/{url_name}/teste', 'HomeController@tipocategoriaTeste');


Route::get('anuncio/{tipo_anuncio}/{id}/{url_anuncio}',[
    'uses' => "HomeController@anuncioInterno"


]);

Route::get('{id}/{url_name}',[
    'uses' => "HomeController@hotsite"

]);
//procura cep


