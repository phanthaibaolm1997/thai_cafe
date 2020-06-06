<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_hoa_don extends Model
{
    protected $table = "chi_tiet_hoa_don";
    protected $primaryKey = ["hd_stt","mh_ma"];

    public function hoa_don(){
        return $this->belongsTo('App\hoa_don', 'hd_stt');
    }
    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_ma');
    }
}
