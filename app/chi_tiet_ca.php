<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_ca extends Model
{
    protected $table = "chi_tiet_ca";
    // protected $primaryKey = ["ca_id","nd_id","ngay"];

    public function ca(){
        return $this->belongsTo('App\ca', 'ca_id');
    }
    public function ngay(){
        return $this->belongsTo('App\ngay', 'ngay');
    }
    public function nguoi_dung(){
        return $this->belongsTo('App\nguoi_dung', 'nd_id');
    }

    public function getAllCTC(){
        $data = chi_tiet_ca::with('ca')
            ->with('nguoi_dung')
            ->get();
        return $data;
    }

    public function createLich($day,$user,$ca){
        $create = new chi_tiet_ca();
        $create->nd_id = $user;
        $create->ngay = $day;
        $create->ca_id = $ca;
        $create->save();
    }

    public function editLich($day,$user,$ca,$oldUser,$oldCa){
        chi_tiet_ca::where([
            'ngay'=>$day,
            'nd_id'=>$oldUser,
            'ca_id'=>$oldCa,
            ])
        ->update([
            'ngay'=>$day,
            'nd_id'=>$user,
            'ca_id'=>$ca,
        ]);
    }
    public function deleteLich($day,$user,$ca){
        chi_tiet_ca::where([
            'ngay'=>$day,
            'nd_id'=>$user,
            'ca_id'=>$ca,
            ])
        ->delete();
    }
}
