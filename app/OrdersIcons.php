<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersIcons extends Model
{
    protected $table = "orders_icons";

    protected $guarded = [];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function icons()
    {
        return $this->hasOne(Icon::class);
    }

}
