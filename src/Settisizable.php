<?php

namespace Settisizer;

use Illuminate\Database\Eloquent\Model;

trait Settisizable {
    function getMyType() {

        dd([
            $this->{$this->getKeyName()},
            $this->getTable(),
            $this instanceof Model
        ]);
    }
}