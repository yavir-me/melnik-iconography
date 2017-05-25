<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{

    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(OrdersIcons::class);
    }

    public function throughOrder()
    {
        $order = DB::table('orders as o')
        ->join('orders_icons as oi', 'o.id', '=', 'oi.order_id')
        ->join('icons as i', 'oi.icon_id', '=', 'i.id')
        ->select(
            'o.*',
            'oi.id as order_icon_id',
            'oi.format',
            'oi.comments',
            'i.title',
            'i.description',
            'i.a3',
            'i.a4',
            'i.a5'
            )
        ->groupBy('o.id')
        ->get();
        dd($order);
    }

    public function getOrderDetails($orderId)
    {
        $details = DB::table('orders_icons as oi')
        ->join('icons as i', 'oi.icon_id', '=', 'i.id')
        ->select(
            'oi.*',
            'i.title',
            'i.description',
            'i.a3',
            'i.a4',
            'i.a5'
            )
        ->where('oi.order_id', $orderId)
        ->get();

        return $details;
    }

}
