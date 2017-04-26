<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{

    public function gallery($path)
    {

        $gallery = Gallery::with('icons')
        ->where('path', $path)
        ->where('lang_id', 3)->get();

        return view('gallery', compact('gallery'));

    }

    public function icon($id)
    {

        $icon = Gallery::getIcon($id);

        return view('icon', compact('icon'));

    }

    public function getGalleries()
    {
        return Gallery::where('lang_id', 3)->get();
    }

}
