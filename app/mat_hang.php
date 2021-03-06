<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mat_hang extends Model
{
    protected $table = "mat_hang";
    protected $primaryKey = "mh_ma";

    public function loai(){
        return $this->belongsTo('App\loai', 'loai_id');
    }
    public function don_vi(){
        return $this->belongsTo('App\don_vi', 'dv_id');
    }
    public function chi_tiet_hinh_anh(){
        return $this->hasMany('App\chi_tiet_hinh_anh', 'mh_ma')
        ->with('hinh_anh');
    }
    public function mathang_nguyenlieu(){
        return $this->hasMany('App\mathang_nguyenlieu', 'mh_ma');
    }
    public function chi_tiet_hoa_don(){
        return $this->hasMany('App\chi_tiet_hoa_don', 'mh_ma');
    }

    public function getAllProd(){
        $data = mat_hang::with('loai')
        ->with('don_vi')
        ->with('mathang_nguyenlieu')
        ->with('chi_tiet_hinh_anh')
        ->get();
        return $data;
    }

    public function createProd($name,$mota,$giaban,$loai,$donvi){
        $create = new mat_hang();
        $create->mh_ten = $name;
        $create->mh_gia = $giaban;
        $create->mh_mota = $mota;
        $create->loai_id = $loai;
        $create->dv_id = $donvi;
        $create->save();

        return $create->mh_ma;
    }

    public function prodDetail($id){
        $data = mat_hang::where('mh_ma',$id)
        ->with('loai')
        ->with('don_vi')
        ->with('mathang_nguyenlieu')
        ->with('chi_tiet_hinh_anh')
        ->first();
        return $data;
    }

    public function updateProd($id,$name,$mota,$giaban,$loai,$donvi){
        mat_hang::where('mh_ma',$id)
        ->update([
            'mh_ten' => $name,
            'mh_mota' => $mota,
            'mh_gia' => $giaban,
            'loai_id' => $loai,
            'dv_id' => $donvi,
        ]);
    }

    public function delProd($id){
        mat_hang::where('mh_ma',$id)->delete();
    }
}
