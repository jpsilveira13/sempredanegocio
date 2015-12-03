<?php
namespace sempredanegocio;

use Illuminate\Foundation\Application;

class Acme extends Application{

    public function publicPath()
    {
        return $this->basePath.'/public_html';
    }
}