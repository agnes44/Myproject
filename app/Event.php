<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // /**
    // *($table description)
    // *@var string
    // */

    // protected $table = 'events';

    // *
    // *($fillable description)
    // *@var [type]
    

    // protected $fillable = [
    //     'title', 'start', 'end', 'color'
    // ];
        protected $table = 'events'; // you may change this to your name table
        public $timestamps = false; // set true if you are using created_at and updated_at
        protected $primaryKey = 'id'; // the default is id
}
