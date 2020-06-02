<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_ca extends Model
{
    protected $table = "chi_tiet_ca";
    protected $primaryKey = ["ca_id","nd_id","ngay"];

    public function ca(){
        return $this->belongsTo('App\ca', 'ca_id');
    }
    public function ngay(){
        return $this->belongsTo('App\ngay', 'ngay');
    }
    public function nguoi_dung(){
        return $this->belongsTo('App\nguoi_dung', 'nd_id');
    }
}
