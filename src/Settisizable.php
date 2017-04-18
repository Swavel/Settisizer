<?php

namespace Settisizer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait Settisizable {
    function setSetting($key, $value) {
        if($this->settingExists($key) === true) {
            //do the update thing
        } else {
            //do the create thing
        }
        //TODO: replace with implementation

        Storage::put('settisizer/'.$this->getKeyString($key,'/'), $value);
        return true;
    }

    function getSetting($key) {
        return $this->settingExists($key)
            ? Storage::get('settisizer/'.$this->getKeyString($key,'/'))
            : false;
    }

    function settingExists($key) {
        return Storage::exists('settisizer/'.$this->getKeyString($key,'/'));
    }

    private function getKeyString($key, $separator = '.') {
        if($this instanceof Model) {
            return 'eloquentmodel' . $separator .
                $this->getTable() . $separator .
                $this->{$this->getKeyName()} . $separator .
                $key;
        }

        return 'app' . $separator .
            $key;
    }
}