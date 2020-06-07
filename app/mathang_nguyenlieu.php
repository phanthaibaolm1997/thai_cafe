<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mathang_nguyenlieu extends Model
{
    protected $table = "mathang_nguyenlieu";
    // protected $primaryKey = ["mh_ma","nl_id"];

    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_ma');
    }
    public function nguyen_lieu(){
        return $this->belongsTo('App\nguyen_lieu', 'nl_id');
    }

    public function createMHNL($mh_ma,$nl_id){
        $create = new mathang_nguyenlieu();
        $create->mh_ma = $mh_ma;
        $create->nl_id = $nl_id;
        $create->save();
    }

    public function deleteMHNLByMH($mh_ma){
        mathang_nguyenlieu::where('mh_ma',$mh_ma)->delete();
    }
}
