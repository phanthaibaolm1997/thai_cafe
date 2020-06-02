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
}
