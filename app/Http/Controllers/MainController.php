<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, DB;

class MainController extends Controller
{

  public function index() {

    // get the last icons
    $icons = DB::table('icons')->select('*')->orderBy('created_at', 'desc')->limit(12)->get();

    // get slides for the slideshow
    $slides = DB::table('slideshow')->select('*')->get();

    return view('main')->with(['icons' => $icons, 'slides' => $slides]);

  }
}
