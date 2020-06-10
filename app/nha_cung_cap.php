<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nha_cung_cap extends Model
{
    protected $table = "nha_cung_cap";
    protected $primaryKey = "ncc_id";

    public function nguyen_lieu_ncc(){
        return $this->hasMany('App\nguyen_lieu_ncc', 'ncc_id');
    }
    public function getAllNCC(){
        return nha_cung_cap::all();
    }

    public function updateNCC($id,$name,$diachi){
        nha_cung_cap::where('ncc_id',$id)
            ->update([
                'ncc_ten' => $name,
                'ncc_diachi' => $diachi
            ]);
    }
    public function createNCC($name,$diachi){
        $create = new nha_cung_cap();
        $create->ncc_ten = $name;
        $create->ncc_diachi = $diachi;
        $create->save();
    }
}
