<?php

namespace Settisizer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait Settisizable {

    /**
     * @var Settisizer
     */
    protected $settisizerImplementation = null;

    function setSetting($key, $value)
    {
        return $this->getMySettisizer()->setSetting($key, $value);
    }

    function getSetting($key)
    {
        return $this->getMySettisizer()->getSetting($key);
    }

    function deleteSetting($key)
    {
        return $this->getMySettisizer()->deleteSetting($key);
    }

    public function getMySettisizer()
    {
        if($this->settisizerImplementation)
            return $this->settisizerImplementation;
        $this->settisizerImplementation = new SettisizerStorage();
        return $this->settisizerImplementation;
    }

}