<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Meta;
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
        $meta = $this->getMeta();
        # Section description
        Meta::set('description', $meta['description']);
        Meta::set('keywords', $meta['keywords']);

        // get all the slides
        $slides = Slideshow::all();

        // get the last icons
        $icons = Icon::latest()->limit(5)->get();

        return view('home', compact('slides', 'icons'));
    }

    public function lastIcons($id)
    {
        return Icon::with(array('gallery' => function($query) {
            $query->select('id', 'path');
        }))
        ->where('lang_id', $id)
        ->latest()
        ->limit(12)
        ->get();
    }

    public function getMeta()
    {
        if (isset($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        } else {
            $lang = 'ru';
        }

        $metaTags = [
        'ua' => [
        'description' => 'Продаж ікон на замовлення. Авторські ікони Ісуса Христа, Богородиці, імені, вінчальні пари, сучасні',
        'keywords' => 'Канонічні, рукописні, храмові ікони, храмовий розпис, живопис, візантійські'
        ],
        'ru' => [
        'description' => 'Продажа икон под заказ. Авторские иконы Исуса Христа, Богородицы, именные, венчальные пары, современные',
        'keywords' => 'Каноничные, рукописные, храмовые иконы, храмовая розпись, живопись, византийские'
        ],
        'en' => [
        'description' => 'Sale of icons to order. Author\'s icons of Jesus Christ, Virgin, registered, wedding couples, modern',
        'keywords' => 'Canonical, manuscripts, icons temple, temple painting, painting, Byzantine'
        ],
        ];

        return $metaTags[$lang];
    }

}