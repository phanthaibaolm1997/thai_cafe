<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khu;
use App\loai;

class OrderController extends Controller
{
    public function getOrder(){
        $khu = new khu();
        $loai = new loai();
        $data['getArea'] = $khu->getAreas();
        $data['getProd'] = $loai->getAllProd();
        
        return view('layouts.admin.contents.order',$data);
    }
}
