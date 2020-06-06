<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinh_anh extends Model
{
    protected $table = "hinh_anh";
    protected $primaryKey = "ha_id";

    public function chi_tiet_hinh_anh(){
        return $this->hasMany('App\chi_tiet_hinh_anh', 'ha_id');
    }

    public function createHA($url){
        $create = new hinh_anh();
        $create->ha_url = $url;
        $create->save();
        
        return $create->ha_id;
    }

}
