<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class nguoi_dung extends Authenticatable
{
    protected $table = "nguoi_dung";
    protected $primaryKey = "nd_id";
    use Notifiable;

    public function hoa_don(){
        return $this->hasMany('App\hoa_don', 'nd_id');
    }
    public function chi_tiet_ca(){
        return $this->hasMany('App\chi_tiet_ca', 'nd_id');
    }
    public function vai_tro(){
        return $this->belongsTo('App\vai_tro', 'vt_id')->with("luong");
    }

    public function getAllNDOri(){
        return nguoi_dung::with('vai_tro')->get();
    }

    public function getAllND($pagi){
        $data = nguoi_dung::with('vai_tro')
            ->paginate($pagi);
        return $data;
    }

    public function createUser($email,$password,$name,$birthday,$phone,$type,$address){
        $create = new nguoi_dung();
        $create->email = $email;
        $create->password = bcrypt($password);
        $create->nd_ten = $name;
        $create->nd_ngaysinh = $birthday;
        $create->nd_sdt = $phone;
        $create->nd_diachi = $address;
        $create->vt_id = $type;
        $create->save();
    }

    public function userSalary(){
        $data = nguoi_dung::with(["vai_tro","chi_tiet_ca" => function($q){
            $q->whereMonth('chi_tiet_ca.ngay', '=', Carbon::now()->subMonth()->month +1);
        }])->get();
        return $data;
    }

}
