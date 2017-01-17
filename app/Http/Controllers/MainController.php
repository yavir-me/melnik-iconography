<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {

    // get the last icons
    $icons = DB::table('icons')->select('*')->orderBy('created_at', 'desc')->limit(12)->get();

    // get slides for the slideshow
    $slides = DB::table('slideshow')->select('*')->get();

    $data['icons'] = $icons;
    $data['slides'] = $slides;

        return view('main', $data);
    }
}
