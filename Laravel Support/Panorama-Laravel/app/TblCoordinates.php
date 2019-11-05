<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCoordinates extends Model
{
    protected $fillable = [
        'x', 'y'
    ];
}
