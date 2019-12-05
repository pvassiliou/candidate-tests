<?php
namespace App\Components\Files;


class SourcesProvider {

    protected $data;
    /**
     * Apla ena demo gia na mhn kanei th douleia mesa ston controller
     */
    public  function doTheSourceStuff($data)
    {
        //TODO na ton paw se enan provider
        $baseFolderSource = "App\Components\Files\Sources";
        if (class_exists($baseFolderSource . "\\" . $data['provider'])) {
            $class = $baseFolderSource . "\\" . $data['provider'];
            $source = new  $class($data);
            $source->doThePostCall();
            $this->data = json_decode($source->returnResponse() , 200);
            $this->seperateDataToFrontEnd();
           // print json_encode($source->returnResponse(), 200);
        }
    }

    public function seperateDataToFrontEnd()
    {
        print_r(current($this->data['data']));
        die();
    }
}