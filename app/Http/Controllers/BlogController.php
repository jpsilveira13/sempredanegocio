<?php

namespace sempredanegocio\Http\Controllers;

use Illuminate\Http\Request;

use sempredanegocio\Http\Requests;
use sempredanegocio\Http\Controllers\Controller;
use sempredanegocio\Models\CategoryNotice;
use sempredanegocio\Models\Notice;
use sempredanegocio\Models\User;

class BlogController extends Controller
{
    private $user;
    private $categoryNotice;
    private $notice;

    public function __construct(User $user,CategoryNotice $categoryNotice,Notice $notice){
        $this->notice = $notice;
        $this->categoryNotice = $categoryNotice;
        $this->user = $user;
    }

    public function index()
    {
        $noticias = $this->notice->orderBy('id','desc')->paginate(10);

            return view('site.blog.principal',compact('noticias'));
    }

    public function interno(){
        return view('site.blog.interno');
    }

}
