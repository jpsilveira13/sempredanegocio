<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\Advert;
use sempredanegocio\Models\AdvertImage;
use sempredanegocio\Models\Feature;
use Intervention\Image\Facades\Image;


class AdvertController extends Controller
{

    private $advertModel;

    public function  __construct(Advert $advertModel){
        $this->advertModel = $advertModel;
    }

    public function store(Request $request, AdvertImage $advertImage){

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['advert_categories_id'] = 100;
        $data['url_anuncio'] = str_slug($data['anuncio_titulo']);
        $features = $request->get('caracteristicas');
        $images = $request->file('anuncio_images');

        unset($data['anuncio_images']);
        unset($data['caracteristicas']);
        $anuncio = Advert::create($data);
        foreach($images as $image){
            $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/gallery/'.$renamed;
            Image::make($image->getRealPath())->resize(603,362)->save($path);
            $advertImage::create(['advert_id' => $anuncio->id,'extension' => $renamed]);

        }
        $anuncio->features()->sync($features);
        return redirect('/')->with('status', 'Anúncio inserido com sucesso!');

    }




}
