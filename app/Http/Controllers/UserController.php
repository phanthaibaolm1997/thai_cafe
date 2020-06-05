<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoi_dung;
use App\vai_tro;

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
    
}
