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
use App\nha_cung_cap;


class CustomController extends Controller
{
    public function deleteHAMH($id, Request $request){
        $ctha = new chi_tiet_hinh_anh();
        $ha = new hinh_anh();

        $ctha->deleteCTHA($id);
        $ha->deleteHA($id);
        
        return redirect()->back()->with('success', "Xóa ảnh thành công!!");
    }

    public function IndexNL(){
        $nguyen_lieu = new nguyen_lieu();
        $ncc = new nha_cung_cap();
        $loai = new loai();
        $data['getAllNL'] = $nguyen_lieu->getAllNL();
        $data['getAllNCC'] = $ncc->getAllNCC();
        $data['getAllLoai'] = $loai->getAllLoai();
        

        return view('layouts.admin.contents.nguyenlieu',$data);
    }
    public function editNL($id, Request $request){
        $name = $request->name;
        $nguyen_lieu = new nguyen_lieu();
        $nguyen_lieu->updateNL($id,$name);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function createNL(Request $request){
        $name = $request->name;
        $nguyen_lieu = new nguyen_lieu();
        $nguyen_lieu->createNL($name);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function editNCC($id, Request $request){
        $name = $request->name;
        $diachi = $request->diachi;
        $ncc = new nha_cung_cap();
        $ncc->updateNCC($id,$name,$diachi);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function createNCC(Request $request){
        $name = $request->name;
        $diachi = $request->diachi;
        $ncc = new nha_cung_cap();
        $ncc->createNCC($name,$diachi);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function editLoai($id, Request $request){
        $name = $request->name;
        $loai = new loai();
        $loai->updateLoai($id,$name);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function createLoai(Request $request){
        $name = $request->name;
        $loai = new loai();
        $loai->createLoai($name);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
}
