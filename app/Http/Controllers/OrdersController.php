<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrdersIcons;
use \Faker\Factory;
use \Carbon\Carbon;
use Mail;
use App\Mail\NewOrder;
use App\Mail\CustomerOrderVerification;

class OrdersController extends Controller
{
    public function makeOrder(Request $request)
    {

        $this->validate(request(), [
          'name' => 'required|min:5|max:30',
          'phone' => 'required|digits_between:9,14',
          ]);

        $faker = Factory::create();
        $orderId = $faker->unique()->numberBetween($min = 00000, $max = 99999);

        Order::create([
            'id' => $orderId,
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'status' => 'new',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);

        foreach ($request->get('cart') as $icon) {
            OrdersIcons::create([
                'order_id' => $orderId,
                'icon_id' => $icon['id'],
                'format' => $icon['format'],
                'comments' => $icon['comment'],
                ]);

        }

        if ($request->get('email')) {
            $this->sendMail($request->get('email'));
        } else {
            $this->sendMail();
        }

    }

    public function sendMail($customerEmail = null)
    {
        Mail::to('vadim.ikonnopis@gmail.com')->send(new NewOrder($customerEmail));

        // send mail to the customer if he provided email address
        if ($customerEmail) {
            Mail::to($customerEmail)->send(new CustomerOrderVerification());
        }
    }



}
