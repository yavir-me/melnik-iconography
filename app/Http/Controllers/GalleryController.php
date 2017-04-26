<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Icon;

class GalleryController extends Controller
{

    public function gallery($path)
    {

        $gallery = Gallery::with('icons')
        ->where('path', $path)
        ->where('lang_id', 3)->get();

        return view('gallery', compact('gallery'));

    }

    public function showIcon($gallery, $id)
    {
        $icon = Icon::find($id);
        return view('icon', compact('icon'));
    }

    public function getGalleries()
    {
        return Gallery::where('lang_id', 3)->get();
    }

}
