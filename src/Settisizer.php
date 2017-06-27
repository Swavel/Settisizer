<?php
namespace Settisizer;


Interface Settisizer{

    public function setSetting($key, $value);
    public function getSetting($key);
    public function deleteSetting($key);

}