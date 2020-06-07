<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_hinh_anh extends Model
{
    protected $table = "chi_tiet_hinh_anh";
    // protected $primaryKey = ["ha_id","mh_ma"];

    public function hinh_anh(){
        return $this->belongsTo('App\hinh_anh', 'ha_id');
    }
    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_ma');
    }

    public function createCTHA($mh_ma,$ha_id){
        $create = new chi_tiet_hinh_anh();
        $create->ha_id = $ha_id;
        $create->mh_ma = $mh_ma;
        $create->save();
    }

    public function deleteCTHA($id){
        chi_tiet_hinh_anh::where('ha_id',$id)->delete();
    }
}
