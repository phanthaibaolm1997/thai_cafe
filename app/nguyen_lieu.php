<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguyen_lieu extends Model
{
    protected $table = "nguyenlieu";
    protected $primaryKey = "nl_id";

    public function nguyen_lieu_ncc(){
        return $this->hasMany('App\nguyen_lieu_ncc', 'nl_id');
    }
    public function mathang_nguyenlieu(){
        return $this->hasMany('App\mathang_nguyenlieu', 'nl_id');
    }

    public function getAllNL(){
        return nguyen_lieu::all();
    }
}
