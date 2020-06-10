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

    public function findExitstMH($order_id,$mh_ma){
        return detail_order::where([
            'order_id'=>$order_id,
            'mh_ma'=>$mh_ma,
            ])->first();
    }

    public function createDO($order_id, $mh_ma, $soluong){
        $create = new detail_order();
        $create->mh_ma = $mh_ma;
        $create->order_id = $order_id;
        $create->dorder_soluong = $soluong;
        $create->save();
    }

    public function orderUpdateQuality($order_id,$mh_ma,$soluong){
        detail_order::where([
            'order_id'=>$order_id,
            'mh_ma'=>$mh_ma,
            ])
        ->update([
            'dorder_soluong'=>$soluong,
        ]);
    }

    public function orderdelMH($order_id,$mh_ma){
        detail_order::where([
            'order_id'=>$order_id,
            'mh_ma'=>$mh_ma,
            ])
        ->delete();
    }

    public function orderMH($order_id,$mh_ma,$mh_soluong){
        if($this->findExitstMH($order_id,$mh_ma) !== null){
            $this->orderUpdateQuality($order_id,$mh_ma,$mh_soluong);
        }else{
            $this->createDO($order_id,$mh_ma,$mh_soluong);
        }
    }

    public function getOrderbyOrderID($order_id){
        $data = detail_order::where(['order_id'=>$order_id])
        ->get();
        return $data;
    }
    public function orderdelByOrderID($order_id){
        detail_order::where(['order_id'=>$order_id])
        ->delete();
    }

}
