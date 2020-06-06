<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khu;

class KhuVucController extends Controller
{
    public function getArea(Request $request){
        $khu = new khu();
        $data['getArea'] = $khu->getAreas();
        return view('layouts.admin.contents.area',$data);
    }
}
