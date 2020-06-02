<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mat_hang extends Model
{
    protected $table = "mat_hang";
    protected $primaryKey = "mh_id";

    public function loai(){
        return $this->belongsTo('App\loai', 'loai_id');
    }
    public function don_vi(){
        return $this->belongsTo('App\don_vi', 'dv_id');
    }
    public function chi_tiet_hinh_anh(){
        return $this->hasMany('App\chi_tiet_hinh_anh', 'mh_id');
    }
    public function mathang_nguyenlieu(){
        return $this->hasMany('App\mathang_nguyenlieu', 'mh_id');
    }
    public function chi_tiet_hoa_don(){
        return $this->hasMany('App\chi_tiet_hoa_don', 'mh_id');
    }
}
