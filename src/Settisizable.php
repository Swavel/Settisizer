<?php

namespace Settisizer;

use Settisizer\Drivers\SettisizerFileStorage;
use Settisizer\Drivers\SettisizerMysqlStorage;

trait Settisizable {

    /**
     * @var /Settisizer/Drivers/Settisizer
     */
    protected $settisizerImplementation = null;

    protected $drivers = [
        'file' => SettisizerFileStorage::class,
        'mysql' => SettisizerMysqlStorage::class
    ];

    private $defaultDriver = SettisizerFileStorage::class;

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

    public function settingExists($key)
    {
        return $this->getSettisizer()->settingExists($key);
    }

    private function getSettisizer()
    {
        if($this->settisizerImplementation)
            return $this->settisizerImplementation;

        // read from config
        $driver = config('settisizer.driver', $this->defaultDriver);
        if(key_exists($driver, $this->drivers)) {
            $this->settisizerImplementation = new $this->drivers[$driver];
        } else {
            $this->settisizerImplementation = new $this->defaultDriver;
        }

        $this->settisizerImplementation->setContext($this);

        return $this->settisizerImplementation;
    }

}