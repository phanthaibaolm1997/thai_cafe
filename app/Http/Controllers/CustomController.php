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

class CustomController extends Controller
{
    public function deleteHAMH($id, Request $request){
        $ctha = new chi_tiet_hinh_anh();
        $ha = new hinh_anh();

        $ctha->deleteCTHA($id);
        $ha->deleteHA($id);
        
        return redirect()->back()->with('success', "Xóa ảnh thành công!!");
    }
}
