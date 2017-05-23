<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticated');
    }

    public function show()
    {
        $galleries = Gallery::where('lang_id', 2)->get();

        return view('admin.dashboard', compact('galleries'));
    }



}
