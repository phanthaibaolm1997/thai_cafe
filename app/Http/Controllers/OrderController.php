<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khu;
use App\loai;
use App\ban;
use App\detail_order;
use App\order;
use App\hoa_don;
use App\chi_tiet_hoa_don;

class OrderController extends Controller
{
    public function getOrder(){
        $khu = new khu();
        $loai = new loai();
        $data['getArea'] = $khu->getAreas();
        $data['getProd'] = $loai->getAllProd();
        
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

    public function addOrder(Request $request){
        $do = new detail_order();

        $mh_soluong = $request->mh_soluong;
        $order_id = $request->order_id;
        $mh_ma = $request->mh_ma;

        $do->orderMH($order_id,$mh_ma,$mh_soluong);
    }

    public function checkOut(Request $request){
        $order_id = $request->order_id;
        $ban_id = $request->ban_id;
        $tongtien = $request->tongtien;
        $do = new detail_order();
        $ban = new ban();
        $hoa_don = new hoa_don();
        $cthd = new chi_tiet_hoa_don();

        $allOrder = $do->getOrderbyOrderID($order_id);
        $hd_stt = $hoa_don->createHoaDon($ban_id,$tongtien);
		foreach($allOrder as $arr){
			$cthd->createCTHD($hd_stt, $arr->mh_ma, $arr->dorder_soluong);
        }

        $ban->deActiveBan($ban_id);
        $do->orderdelByOrderID($order_id);

        return redirect()->back()->with('success', "Thanh toán thành công!!");

    }
}
