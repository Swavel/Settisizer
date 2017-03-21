<?php

namespace Settisizer\Engine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsEngine extends Controller
{
    public function getSetting($key) {

    }

    public function setSetting($key, $value, $context) {
        //TODO add validations
        $this->storeSetting($key, $value);
    }

    private function storeSetting($key, $value) {
        //Store Settings by Classname (User::class)
    }
}
