<?php

namespace Settisizer;

trait Settisizable {

    /**
     * @var Settisizer
     */
    protected $settisizerImplementation = null;
        // replace with reflection class
    private $availableDrivers = [SettisizerStorage::class];
    private $defaultDriver = SettisizerStorage::class;

    function setSetting($key, $value)
    {
        return $this->getSettisizer()->setSetting($key, $value);
    }

    function getSetting($key)
    {
        return $this->getSettisizer()->getSetting($key);
    }

    function deleteSetting($key)
    {
        return $this->getSettisizer()->deleteSetting($key);
    }

    private function getSettisizer()
    {
        if($this->settisizerImplementation)
            return $this->settisizerImplementation;

        // read from config
        $driver = config('settisizer.driver', $this->defaultDriver);
        if(in_array($driver, $this->getAvailableDrivers())) {
            $this->settisizerImplementation = new $driver;
        } else {
            $this->settisizerImplementation = new $this->defaultDriver;
        }

        return $this->settisizerImplementation;
    }

    private function getAvailableDrivers() {
        return $this->availableDrivers;
    }

}