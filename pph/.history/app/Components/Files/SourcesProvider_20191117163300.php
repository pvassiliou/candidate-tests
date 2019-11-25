<?php
namespace App\Components\Files;

use Illuminate\Support\ServiceProvider;

class SourcesProvider extends ServiceProvider{

    /**
     * Apla ena demo gia na mhn kanei th douleia mesa ston controller
     */
    public static function doTheSourceStuff($data)
    {
        //TODO na ton paw se enan provider
        $baseFolderSource = "App\Components\Files\Sources";
        if (class_exists($baseFolderSource . "\\" . $data['provider'])) {
            $class = $baseFolderSource . "\\" . $data['provider'];
            $source = new  $class($data);
            $source->doThePostCall();
            print json_encode($source->returnResponse(), 200);
        }
    }
}