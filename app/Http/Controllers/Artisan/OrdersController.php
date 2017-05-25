<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use DB;
class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticated');
    }

    public function show()
    {

        $orders = Order::orderBy('created_at', 'desc')
        ->get();

        return view('admin.orders', compact('orders'));

    }

    public function getOrderDetails($orderId)
    {
        $details = new Order();
        $orderDetails = $details->getOrderDetails($orderId);

        return $orderDetails;
    }

    public function changeOrderStatus($orderId, $status)
    {
        Order::where('id', $orderId)
        ->update(['status' => $status]);
    }

}
