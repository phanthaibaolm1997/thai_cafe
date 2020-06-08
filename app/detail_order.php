<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    protected $table = "detail_order";

    public function order(){
        return $this->belongsTo('App\order', 'order_id');
    }
    public function mat_hang(){
        return $this->belongsTo('App\mat_hang', 'mh_ma');
    }

    public function createDO($order_id, $mh_ma, $soluong){
        $create = new detail_order();
        $create->mh_ma = $mh_ma;
        $create->order_id = $order_id;
        $create->dorder_soluong = $soluong;
        $create->save();
    }
}
