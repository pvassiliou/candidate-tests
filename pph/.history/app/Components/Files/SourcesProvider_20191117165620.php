<?php

namespace App\Components\Files;


class SourcesProvider
{

    protected $dataFromApi;
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
            $source->doThePostCall($data);
             $this->dataFromApi = json_decode($source->returnResponse(), 200);
             print json_encode($this->seperateDataToFrontEnd(), 200);
        }
        else{
            $error["status"] = 500;
            print json_encode($error, 200);
        }
    }

    public function seperateDataToFrontEnd()
    {
        $dataToFrontEnd['status'] = 200;
        $dataToFrontEnd['temp'] = current($this->dataFromApi['data'])['temp'];
        $dataToFrontEnd['desc'] = current($this->dataFromApi['data'])['weather']['description'];
        return json_encode($dataToFrontEnd);
    }
}
