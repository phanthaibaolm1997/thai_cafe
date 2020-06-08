<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khu;
use App\loai;
use App\ban;
use App\detail_order;
use App\order;

class OrderController extends Controller
{
    public function getOrder(){
        $khu = new khu();
        $loai = new loai();
        $data['getArea'] = $khu->getAreas();
        $data['getProd'] = $loai->getAllProd();
        // dd($data);
        
        return view('layouts.admin.contents.order',$data);
    }

    public function Order(Request $request){
        $do = new detail_order();
        $order = new order();
        $ban = new ban();
        
        $ban_id = $request->ban;
		$key = $request->arrKey;
		$number = $request->arrNumber;
        $dataKey = explode(",", $key[0]);
        $dataNum = explode(",", $number[0]);
        
        $ban->activeBan($ban_id);
        $order_id = $order->checkOrCreate($ban_id);
        $i = 0;
		foreach($dataKey as $key){
			$do->createDO($order_id, $key, $dataNum[$i]);
			$i++;
        }
        
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function orderUpdateQuality(Request $request){
        $do = new detail_order();

        $soluong = $request->soluong;
        $order_id = $request->order_id;
        $mh_ma = $request->mh_ma;

        $do->orderUpdateQuality($order_id,$mh_ma,$soluong);
        // return redirect()->back()->with('success', "Update thành công!!");
    }

    public function orderdelMH(Request $request){
        $do = new detail_order();

        $order_id = $request->order_id;
        $mh_ma = $request->mh_ma;

        $do->orderdelMH($order_id,$mh_ma);
    }
}
