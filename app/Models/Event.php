<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = [];
        protected $casts = [
        'time' => 'datetime', // Casts the time string to a Carbon instance
    ];
}
