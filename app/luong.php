<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luong extends Model
{
    protected $table = "luong";
    protected $primaryKey = "luong_id";

    public function vai_tro(){
        return $this->hasMany('App\vai_tro', 'luong_id');
    }
}
