<?php
namespace Settisizer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SettisizerStorage implements Settisizer {
    private $context;

    public function setContext($context) {
        $this->context = $context;
    }

    public function setSetting($key, $value)
    {
        return Storage::put('settisizer/'.$this->getKeyString($key,'/'), $value);
    }

    public function getSetting($key)
    {
        return $this->settingExists($key)
            ? Storage::get('settisizer/'.$this->getKeyString($key,'/'))
            : null;
    }

    public function deleteSetting($key) {
        return $this->settingExists($key)
            ? Storage::delete('settisizer/'.$this->getKeyString($key,'/'))
            : false;
    }

    public function settingExists($key) {
        return Storage::exists('settisizer/'.$this->getKeyString($key,'/'));
    }

    private function getKeyString($key, $separator = '/') {
        if($this->context instanceof Model) {
            return 'eloquentmodel' . $separator .
                $this->context->getTable() . $separator .
                $this->context->{$this->context->getKeyName()} . $separator .
                $key;
        }
        return 'global' . $separator .
            $key;
    }

}