<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ban extends Model
{
    protected $table = "ban";
    protected $primaryKey = "ban_id";

    public function khu(){
        return $this->belongsTo('App\khu', 'khu_id');
    }
}
