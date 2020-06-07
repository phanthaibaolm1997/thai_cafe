<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ngay extends Model
{
    protected $table = "ngay";
    protected $primaryKey = "ngay";

    public function chi_tiet_ca(){
        return $this->hasMany('App\chi_tiet_ca', 'ngay');
    }
    public function createNgay($ngay){
        $create = new ngay();
        $create->ngay = $ngay;
        $create->save();
    }

    public function checkOrCreate($ngay){
        $data = ngay::where('ngay',$ngay)->first();
        if ($data === null) {
            $this->createNgay($ngay);
        }
    }

}
