<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use \Faker\Factory;

class OrdersController extends Controller
{
    public function makeOrder(Request $request)
    {

        $this->validate(request(), [
          'name' => 'required|min:5|max:30',
          'phone' => 'required|digits_between:9,14',
          ]);

        $blankOrder = $request->all();

        $faker = Factory::create();
        $orderId = $faker->unique()->numberBetween($min = 00000, $max = 99999);

        foreach ($request->get('cart') as $icon) {
            Order::create([
                'order_id' => $orderId,
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'comments' => $icon['comment'],
                'icon_id' => $icon['id'],
                'format' => $icon['format']
                ]);
        }

    }
}
