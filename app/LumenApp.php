<?php

namespace App;

use Laravel\Lumen\Application;

class LumenApp extends Application {

    public function publicPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'public_html';
    }

}