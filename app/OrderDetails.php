<?php

namespace App;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table ='order_details';
    protected $fillable = [
        'order_id',
        'order_status',
        'total_price_of_orders'
    ];


    public function Order()
    {
        return $this->hasMany('App\Order','order_id','id');
    }
}
