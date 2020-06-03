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
    
}
