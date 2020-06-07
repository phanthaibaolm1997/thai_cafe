<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khu extends Model
{
    protected $table = "khu";
    protected $primaryKey = "khu_id";

    public function ban(){
        return $this->hasMany('App\ban', 'khu_id')
        ->with('order');
    }

    public function getAreas(){
       return khu::with('ban')->get();
    }

    public function createArea($area){
        $create = new khu();
        $create->khu_ten = $area;
        $create->save();
    }

    public function editArea($id,$area){
        khu::where('khu_id',$id)->update([
            'khu_ten'=>$area
        ]);
    }
    public function deleteArea($id){
        khu::where('khu_id',$id)->delete();
    }

    public function manageArea($id){
        $data = khu::where('khu_id',$id)
            ->with('ban')->first();
        return $data;
    }
}
