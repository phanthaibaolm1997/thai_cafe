<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    protected $table = "loai";
    protected $primaryKey = "loai_id";

    public function mat_hang(){
        return $this->hasMany('App\mat_hang', 'loai_id')
        ->with('chi_tiet_hinh_anh')
        ->with('mathang_nguyenlieu')
        ->with('don_vi');
    }

    public function getAllLoai(){
        return loai::all();
    }

    public function getAllProd(){
        return loai::with('mat_hang')->get();
    }

}
