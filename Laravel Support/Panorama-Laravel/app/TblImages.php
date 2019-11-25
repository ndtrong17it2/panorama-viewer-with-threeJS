<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblImages extends Model
{
    public function group()
    {
        return $this->belongsTo('App\TblGroupsImages', 'group_id');
    }

    protected $fillable = [
        'name', 'src'
    ];
}
