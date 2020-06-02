<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khu extends Model
{
    protected $table = "khu";
    protected $primaryKey = "khu_id";

    public function ban(){
        return $this->hasMany('App\ban', 'khu_id');
    }
}
