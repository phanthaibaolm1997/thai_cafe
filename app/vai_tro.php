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
}
