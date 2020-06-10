<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\nguoi_dung;
use App\vai_tro;
use App\luong;

class UserController extends Controller
{

    public function getUser(Request $request){
        $user = new nguoi_dung();
        $type = new vai_tro();
        $data['allUser'] = $user->getAllND(10);
        $data['userTypes'] = $type->getAllRole();
        return view('layouts.admin.contents.nguoidung',$data);
    }

    public function addUser(Request $request){
        $user = new nguoi_dung();
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $birthday = $request->birthday;
        $phone = $request->phone;
        $type = $request->type;
        $address = $request->address;
        $user->createUser($email,$password,$name,$birthday,$phone,$type,$address);
        return back();
    }

    public function userSalary(Request $request){
        $user = new nguoi_dung();
        $data['allUser'] = $user->userSalary();
        $data['thisMonth'] = Carbon::now()->subMonth()->month +1;
        return view('layouts.admin.contents.luong',$data);
    }
    

    public function getVaiTro(){
        $vaitro = new vai_tro();
        $luong = new luong();
        $data['allVaiTro'] = $vaitro->getAllVT();
        $data['allLuong'] = $luong->allLuong();

        return view('layouts.admin.contents.vaitro',$data);
    }

    public function editVaiTro($id, Request $request){
        $name = $request->nameVT;
        $luong = $request->luongVT;
        $vaitro = new vai_tro();
        $vaitro->updateVT($id,$name,$luong);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function createVT(Request $request){
        $name = $request->nameVT;
        $luong = $request->luongVT;
        $vaitro = new vai_tro();
        $vaitro->createVT($name,$luong);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function editLuong($id, Request $request){
        $name = $request->name;
        $sotien = $request->sotien;
        $luong = new luong();
        $luong->updateLuong($id,$name,$sotien);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
    public function createLuong(Request $request){
        $name = $request->name;
        $sotien = $request->sotien;
        $luong = new luong();
        $luong->createLuong($name,$sotien);
        return redirect()->back()->with('success', "Thêm mới thành công!!");
    }
}
