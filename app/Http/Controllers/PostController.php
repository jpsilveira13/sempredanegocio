<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Post;

class PostController extends Controller
{

    private $postModel;

    public function __construct(Post $postModel){
        $this->postModel = $postModel;

    }

    public function store(Request $request){
        $caracteristicas = $request->get('caracteristicas');
        $post = $this->postModel->fill($request->all());

        $post->caracteristicas = implode(',',$caracteristicas);


        $post->save();
        return view('site.pages.anuncie', [


        ]);
    }

}




