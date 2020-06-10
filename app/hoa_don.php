<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as time;


class hoa_don extends Model
{
    protected $table = "hoa_don";
    protected $primaryKey = "hd_stt";

    public function chi_tiet_hoa_don(){
        return $this->hasMany('App\chi_tiet_hoa_don', 'hd_stt');
    }

    public function createHoaDon($ban_id,$tongtien){
        $create = new hoa_don();
        $create->ban_id = $ban_id;
        $create->nd_id = '1';
        $create->hd_tongtien = $tongtien;
        $create->hd_ngaylap = time::now()->toDateTimeString();
        $create->save();
        return $create->hd_stt;
    }
}
