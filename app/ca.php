<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ca extends Model
{
    protected $table = "ca";
    protected $primaryKey = "ca_id";

    public function chi_tiet_ca(){
        return $this->hasMany('App\chi_tiet_ca', 'ca_id');
    }

    public function getAllCa(){
        return ca::all();
    }
}
