<?php

namespace Settisizer;

use Illuminate\Database\Eloquent\Model;

class SettisizerSetting extends Model
{
    protected $table = 'settisizer_settings';

    public function tuples() {
        return $this->hasManyThrough(SettisizerTuple::class, SettisizerValue::class, 'settisizer_setting_id', 'settisizer_tuple_id', 'id');
    }
}
