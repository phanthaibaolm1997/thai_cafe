<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoi_dung;
use App\ca;
use App\chi_tiet_ca;
use App\ngay;

class PhanCongController extends Controller
{
    public function getCalendar(){
        $ca = new ca();
        $user = new nguoi_dung();
        $chi_tiet_ca = new chi_tiet_ca();
        $data['allCa'] = $ca->getAllCa();
        $data['allNV'] = $user->getAllNDOri();
        $data['allPC'] = $chi_tiet_ca->getAllCTC();
        return view('layouts.admin.contents.phancong',$data);
    }

    public function addPhanCong(Request $request){
        $day = $request->day;
        $user = $request->user;
        $ca = $request->ca;

        $chi_tiet_ca = new chi_tiet_ca();
        $ngay = new ngay();
        $ngay->checkOrCreate($day);
        $chi_tiet_ca->createLich($day,$user,$ca);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function editPhanCong(Request $request){
        $day = $request->day;
        $user = $request->user;
        $ca = $request->ca;
        $oldUser = $request->oldUser;
        $oldCa = $request->oldCa;

        $chi_tiet_ca = new chi_tiet_ca();
        $ngay = new ngay();
        $ngay->checkOrCreate($day);
        $chi_tiet_ca->editLich($day,$user,$ca,$oldUser,$oldCa);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }

    public function deletePhanCong(Request $request){
        $day = $request->ngay;
        $user = $request->user;
        $ca = $request->ca;


        $chi_tiet_ca = new chi_tiet_ca();
        $chi_tiet_ca->deleteLich($day,$user,$ca);
        return redirect()->back()->with('success', "Xóa thành công!!");
    }
}
