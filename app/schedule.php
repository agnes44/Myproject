<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $table = 'schedule';
    public function getBodyAttribute($value)
    {
        return ucfirst($value);
    }
    
    public function setBodyAttribute($value)
    {
        return $this->attributes['body'] = ucfirst($value);
    }
}

