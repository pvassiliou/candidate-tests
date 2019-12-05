<?php
namespace app\Components\Files\Source;

use Illuminate\Support\ServiceProvider;

class SourcesProvider extends ServiceProvider{

    /**
     * Apla ena demo gia na mhn kanei th douleia mesa ston controller
     */
    public function toTheSourceStuff($class)
    {
        //TODO na ton paw se enan provider
        $baseFolderSource = "App\Components\Files\Sources";
        if (class_exists($baseFolderSource . "\\" . $_POST['provider'])) {
            $class = $baseFolderSource . "\\" . $_POST['provider'];
            $source = new  $class($_POST);
            $source->doThePostCall();
            print json_encode($source->returnResponse(), 200);
        }
    }
}