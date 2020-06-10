<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vai_tro extends Model
{
    protected $table = "vai_tro";
    protected $primaryKey = "vt_id";

    public function nguoi_dung(){
        return $this->hasMany('App\nguoi_dung', 'vt_id');
    }
    public function luong(){
        return $this->belongsTo('App\luong', 'luong_id');
    }

    public function getAllRole(){
    	return vai_tro::all();
    }

    public function getAllVT(){
        return vai_tro::with('luong')->get();
    }

    public function updateVT($id,$name,$luong){
        vai_tro::where('vt_id',$id)
            ->update([
                'vt_ten' => $name,
                'luong_id' => $luong
            ]);
    }
    public function createVT($name,$luong){
        $create = new vai_tro();
        $create->vt_ten = $name;
        $create->luong_id = $luong;
        $create->save();
    }
        
}
