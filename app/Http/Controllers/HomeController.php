<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Icon;
use App\Slideshow;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get all the slides
        $slides = Slideshow::all();

        // get the last icons
        $icons = Icon::latest()->limit(5)->get();

        return view('home', compact('slides', 'icons'));
    }

    public function lastIcons()
    {
        return Icon::with(array('gallery' => function($query) {
            $query->select('id', 'path');
        }))->latest()->limit(12)->get();
    }

}
