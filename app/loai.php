<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    protected $table = "loai";
    protected $primaryKey = "loai_id";

    public function mat_hang(){
        return $this->hasMany('App\mat_hang', 'loai_id');
    }

}
