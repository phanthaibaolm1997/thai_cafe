<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khu;
use App\ban;

class KhuVucController extends Controller
{
    public function getArea(Request $request){
        $khu = new khu();
        $data['getArea'] = $khu->getAreas();
        return view('layouts.admin.contents.area',$data);
    }

    public function addArea(Request $request){
        $khu = new khu();
        $area = $request->area;
        $khu->createArea($area);
        return back();
    }
    public function editArea($id, Request $request){
        $khu = new khu();
        $area = $request->area;
        $khu->editArea($id,$area);
        return back();
    }

    public function deleteArea($id){
        $khu = new khu();
        $khu->deleteArea($id);
        return back();
    }

    public function manageArea($id){
        $khu = new khu();
        $ban = new ban();
        $data['getArea'] = $khu->manageArea($id);
        $data['banActive'] = $ban->getActiveByArea($id);
        $data['banDeactive'] = $ban->getDeactiveByArea($id);
        return view('layouts.admin.contents.area-manage',$data);
    }

    public function addBan(Request $request){
        $ban = new ban();
        $id = $request->id;
        $name = $request->name;
        $ban->createBan($id,$name);
        return back();
    }

    public function editBan($id, Request $request){
        $ban = new ban();
        $name = $request->name;
        $ban->editBan($id,$name);
        return back();
    }

    public function deleteBan($id){
        $ban = new ban();
        $ban->deleteBan($id);
        return back();
    }
}
