<?php

namespace app\Components\Files\Sources;

use App\Components\Files\Sources\Source;

class Source_Weatherbit extends Source
{
    const API_KEY = "apiKey";

    public function __construct($data)
    {
        $this->setApiKey($data[self::API_KEY]);
        $this->setSourceApiCall();
    }
    public function setApiKey($key)
    {
        $this->apiKey = $key;
    }
    public function setSource()
    {
        $this->source = __CLASS__;
    }
    public function setSourceApiCall()
    {
        $this->sourceApiCall = "https://api.weatherbit.io/v2.0/forecast/daily?key=c9c6330b69e7451bb659bd829f165b89&city_id=8953360&days=1";
    }
    public function getSource()
    {
        return $this->source;
    }

    public function getSourceApiCall()
    {
        return $this->sourceApiCall;
    }
}
