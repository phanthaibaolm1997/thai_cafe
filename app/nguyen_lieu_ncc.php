<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguyen_lieu_ncc extends Model
{
    protected $table = "nguyen_lieu_ncc";
    protected $primaryKey = ["ncc_id","nl_id"];

    public function nha_cung_cap(){
        return $this->belongsTo('App\nha_cung_cap', 'ncc_id');
    }
    public function nguyen_lieu(){
        return $this->belongsTo('App\nguyen_lieu', 'nl_id');
    }
}
