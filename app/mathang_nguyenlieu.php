<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mathang_nguyenlieu extends Model
{
    protected $table = "mathang_nguyenlieu";
    protected $primaryKey = ["mh_id","nl_id"];

    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_id');
    }
    public function nguyen_lieu(){
        return $this->belongsTo('App\nguyen_lieu', 'nl_id');
    }
}
