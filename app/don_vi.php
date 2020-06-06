<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class don_vi extends Model
{
    protected $table = "don_vi";
    protected $primaryKey = "dv_id";

    public function mat_hang(){
        return $this->hasMany('App\mat_hang', 'dv_id');
    }

    public function getAllDonVi(){
        return don_vi::all();
    }
}
