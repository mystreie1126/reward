<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'ps_orders';
    protected $primaryKey = 'id_order';

    public $timestamps = false;
    public function order_detail(){
    	return $this->hasMany('App\Order_detail','id_order');
    }

    public function reward(){
    	return $this->hasOne('App\Models\Online_reward','id_order');
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Online_customer','id_customer');
    }
}
