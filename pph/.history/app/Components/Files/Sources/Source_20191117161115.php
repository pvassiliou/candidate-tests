<?php

namespace app\Components\Files\Sources;

use Illuminate\Support\ServiceProvider;

abstract class Source extends ServiceProvider
{
    protected $configBasePath = "sources";
    protected $source;
    protected $sourceApiCall;
    protected $headers = [];
    protected $response;
    protected $postfields = [];

    public function doThePostCall()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->sourceApiCall);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        print_r($output);
        $this->response = $output;
    }

    public function returnResponse()
    {
        return $this->response;
    }
}