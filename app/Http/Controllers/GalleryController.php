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
        $icon = Icon::with(array('gallery' => function($query) {
            $query->select('id', 'path');
        }))->find($id);
        $formats = [
        'a3' => $icon->a3,
        'a4' => $icon->a4,
        'a5' => $icon->a5
        ];

        return view('icon', compact('icon', 'formats'));
    }

    public function getGalleries()
    {
        return Gallery::where('lang_id', 3)->get();
    }

}
