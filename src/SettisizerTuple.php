<?php

namespace Settisizer;

use Illuminate\Database\Eloquent\Model;

class SettisizerTuple extends Model
{
    protected $table = 'settisizer_tuples';

    public function model() {
        return $this->morphTo();
    }

    public function settings() {
        return $this->belongsToMany(SettisizerSetting::class, 'settisizer_values')->withPivot('data');
    }
}
