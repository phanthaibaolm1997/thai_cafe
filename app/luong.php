<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luong extends Model
{
    protected $table = "luong";
    protected $primaryKey = "luong_id";

    public function vai_tro(){
        return $this->hasMany('App\vai_tro', 'luong_id');
    }

    public function allLuong(){
        return luong::all();
    }

    public function updateLuong($id,$name,$sotien){
        luong::where('luong_id',$id)
            ->update([
                'luong_ten' => $name,
                'sotien' => $sotien
            ]);
    }
    public function createLuong($name,$sotien){
        $create = new luong();
        $create->luong_ten = $name;
        $create->sotien = $sotien;
        $create->save();
    }
}
