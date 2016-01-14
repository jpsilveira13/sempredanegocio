<?php

namespace sempredanegocio\Http\Controllers;


use sempredanegocio\Http\Requests;


class AdminController extends Controller
{

    private function home()
    {
        return view('admin.home');
    }


}
