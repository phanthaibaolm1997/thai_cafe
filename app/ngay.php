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

}
