<?php
namespace Settisizer;


Interface Settisizer{
    public function setContext($context);
    public function setSetting($key, $value);
    public function getSetting($key);
    public function deleteSetting($key);
    public function settingExists($key);
}