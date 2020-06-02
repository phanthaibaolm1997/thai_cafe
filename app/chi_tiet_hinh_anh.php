<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_hinh_anh extends Model
{
    protected $table = "chi_tiet_hinh_anh";
    protected $primaryKey = ["ha_id","mh_id"];

    public function hinh_anh(){
        return $this->belongsTo('App\hinh_anh', 'ha_id');
    }
    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_id');
    }
}
