<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblGroupsImages extends Model
{
    public function images()
    {
        return $this->hasMany('App\TblImages', 'group_id');
    }
    protected $fillable = [
        'name'
    ];
}
