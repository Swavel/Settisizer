<?php
namespace Settisizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SettisizerStorage implements Settisizer{

    public function setSetting($key, $value)
    {
        Storage::put('settisizer/'.$this->getKeyString($key,'/'), $value);
        return true;
    }

    public function getSetting($key)
    {
        return $this->settingExists($key)
            ? Storage::get('settisizer/'.$this->getKeyString($key,'/'))
            : false;
    }

    public function deleteSetting($key) {
        return $this->settingExists($key)
            ? Storage::delete('settisizer/'.$this->getKeyString($key,'/'))
            : false;
    }

    private function settingExists($key) {
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