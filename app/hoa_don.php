<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoa_don extends Model
{
    protected $table = "hoa_don";
    protected $primaryKey = "hd_stt";

    public function chi_tiet_hoa_don(){
        return $this->hasMany('App\chi_tiet_hoa_don', 'hd_stt');
    }
}
