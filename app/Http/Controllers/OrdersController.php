<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, DB;

class OrdersController extends Controller
{
  public function makeOrder(Request $request) {

    // validation
    $this->validate($request, [
      'full-name' => 'required|min:5|max:30',
      'email' => 'required|email',
      'phone' => 'required|digits_between:9,14',
      'comment' => 'min:5|max:1000'
      ]);

    DB::table('orders')->insert([
        'client' => $request->input('full-name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'comment' => $request->input('comment'),
        ]);

}
}
