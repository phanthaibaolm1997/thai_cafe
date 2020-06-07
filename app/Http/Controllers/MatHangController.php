<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mat_hang;
use App\don_vi;
use App\loai;
use App\nguyen_lieu;
use App\mathang_nguyenlieu;
use App\chi_tiet_hinh_anh;
use App\hinh_anh;

class MatHangController extends Controller
{
    public function getProd(Request $request){
        $prod = new mat_hang();
        $data['allProd'] = $prod->getAllProd();
        return view('layouts.admin.contents.mathang',$data);
    }

    public function prodAddUI(Request $request){
        $loai = new loai();
        $don_vi = new don_vi();
        $nl = new nguyen_lieu();
        $data['allLoai'] = $loai->getAllLoai();
        $data['allDonVi'] = $don_vi->getAllDonVi();
        $data['allNL'] = $nl->getAllNL();
        return view('layouts.admin.contents.mathang_add',$data);
    }

    public function prodAdd(Request $request){
        $i = 0;
        $name = $request->name;
		$mota = $request->mota;
		$giaban = $request->giaban;
		$loai = $request->loai;
		$donvi = $request->donvi;
		$nguyenlieu = $request->nguyenlieu;

        $prod = new mat_hang();
		$mhnl = new mathang_nguyenlieu();
        $ctha = new chi_tiet_hinh_anh();
        $hinhanh = new hinh_anh();

        $mh_ma= $prod->createProd($name,$mota,$giaban,$loai,$donvi);

        foreach($nguyenlieu as $nl){	
            $mhnl->createMHNL($mh_ma,$nl); 
        }
        
		if($request->hasfile('imgup'))
		{
			foreach($request->file('imgup') as $file)
			{

				$url = 'assets/images/products/'.time().'_'.$i.'.'.$file->extension();
				$file->move(public_path().'/assets/images/products/', $url);   
				$ha_id = $hinhanh->createHA($url);
                $ctha->createCTHA($mh_ma,$ha_id);
                $i+= 1;
			}
		}

    	return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function prodEditUI($id, Request $request){
        $loai = new loai();
        $don_vi = new don_vi();
        $nl = new nguyen_lieu();
        $prod = new mat_hang();
        $data['detailProd'] = $prod->prodDetail($id);
        $data['allLoai'] = $loai->getAllLoai();
        $data['allDonVi'] = $don_vi->getAllDonVi();
        $data['allNL'] = $nl->getAllNL();
        return view('layouts.admin.contents.mathang_edit',$data);
    }

    public function prodEdit(Request $request){
        $i = 0;
        $name = $request->name;
		$mota = $request->mota;
		$giaban = $request->giaban;
		$loai = $request->loai;
		$donvi = $request->donvi;
        $nguyenlieu = $request->nguyenlieu;
        $mh_ma = $request->mh_ma;

        $prod = new mat_hang();
		$mhnl = new mathang_nguyenlieu();
        $ctha = new chi_tiet_hinh_anh();
        $hinhanh = new hinh_anh();

        $prod->updateProd($mh_ma,$name,$mota,$giaban,$loai,$donvi);
        $mhnl->deleteMHNLByMH($mh_ma);
        foreach($nguyenlieu as $nl){	
            $mhnl->createMHNL($mh_ma,$nl); 
        }
        
		if($request->hasfile('imgup'))
		{
			foreach($request->file('imgup') as $file)
			{
				$url = 'assets/images/products/'.time().'_'.$i.'.'.$file->extension();
				$file->move(public_path().'/assets/images/products/', $url);   
				$ha_id = $hinhanh->createHA($url);
                $ctha->createCTHA($mh_ma,$ha_id);
                $i+= 1;
			}
        }
        
    	return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function delProd($id){
        $prod = new mat_hang();
        $prod->delProd($id);
        return redirect()->back()->with('success', "Xóa mặt hàng thành công!!");
    }

}
