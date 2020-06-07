<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $primaryKey = "order_id";

    public function ban(){
        return $this->belongsTo('App\ban', 'ban_id');
    }
    public function detail_order(){
        return $this->hasMany('App\detail_order', 'order_id');
    }
}
