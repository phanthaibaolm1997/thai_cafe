<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoi_dung;

class UserController extends Controller
{

    public function getUser(Request $request){
        $user = new nguoi_dung();
        $data['allUser'] = $user->getAllND(10);
        return view('layouts.admin.contents.nguoidung',$data);
    }
    
}
