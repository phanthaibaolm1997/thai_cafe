<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ban extends Model
{
    protected $table = "ban";
    protected $primaryKey = "ban_id";

    public function khu(){
        return $this->belongsTo('App\khu', 'khu_id');
    }

    public function createBan($id,$name){
        $create = new ban();
        $create->ban_ten = $name;
        $create->khu_id = $id;
        $create->save();
    }

    public function getActiveByArea($id){
        return ban::where(['khu_id'=>$id, 'ban_tinhtrang'=>0])->get();
    }

    public function getDeactiveByArea($id){
        return ban::where(['khu_id'=>$id, 'ban_tinhtrang'=>1])->get();
    }

    public function editBan($id,$name){
        ban::where('ban_id',$id)->update([
            'ban_ten'=>$name
        ]);
    }

    public function deleteBan($id){
        ban::where('ban_id',$id)->delete();
    }
}
