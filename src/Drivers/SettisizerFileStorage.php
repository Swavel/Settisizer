<?php

namespace Settisizer\Drivers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Settisizer\Settisizable;

class SettisizerFileStorage implements Settisizer {

    /**
     * The storage's context.
     *
     * @var \Settisizer\Settisizable
     */
    private $context;

    /**
     * Context setter.
     *
     * @param \Settisizer\Settisizable $context
     */
    public function setContext($context) {
        $this->context = $context;
    }

    /**
     * Set some setting.
     *
     * @param $key
     *   The setting's key.
     * @param $value
     *   The setting's value.
     * @return bool
     *   Return true if successful.
     */
    public function setSetting($key, $value) {
        return Storage::put('settisizer/' . $this->getKeyString($key), $value);
    }

    /**
     * Get a setting for the specified key.
     *
     * @param $key
     *   The key to search in the storage.
     * @return null|string
     *   Returns the value, if exists or null if not.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *   Throws an exception if file does not exist.
     */
    public function getSetting($key) {
        return $this->settingExists($key)
            ? Storage::get('settisizer/' . $this->getKeyString($key))
            : null;
    }

    /**
     * Delete the setting with the specified key.
     *
     * @param $key
     *   The key to delete.
     * @return bool
     *   Returns true if successful.
     */
    public function deleteSetting($key) {
        return $this->settingExists($key)
            ? Storage::delete('settisizer/' . $this->getKeyString($key))
            : false;
    }

    /**
     * Checks if the setting does exist.
     *
     * @param $key
     *   The key to check.
     * @return bool
     *   Returns true if it does exist.
     */
    public function settingExists($key) {
        return Storage::exists('settisizer/' . $this->getKeyString($key));
    }

    /**
     * Convert the key to a filepath.
     *
     * @param $key
     *   The key to convert.
     * @param string $separator
     *   Seperator. Default is "/".
     * @return string
     *   The converted key which can be used as path.
     */
    private function getKeyString($key, $separator = '/') {
        if ($this->context instanceof Model) {
            return 'eloquentmodel' . $separator .
                $this->context->getTable() . $separator .
                $this->context->{$this->context->getKeyName()} . $separator .
                $key;
        }

        return 'global' . $separator . $key;
    }

}