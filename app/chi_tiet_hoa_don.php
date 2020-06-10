<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_hoa_don extends Model
{
    protected $table = "chi_tiet_hoa_don";
    // protected $primaryKey = ["hd_stt","mh_ma"];

    public function hoa_don(){
        return $this->belongsTo('App\hoa_don', 'hd_stt');
    }
    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_ma');
    }

    public function createCTHD($hd_stt, $mh_ma, $soluong){
        $create = new chi_tiet_hoa_don();
        $create->mh_ma = $mh_ma;
        $create->hd_stt = $hd_stt;
        $create->cthd_soluong = $soluong;
        $create->save();
    }
}
