<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Icon;

class GalleryController extends Controller
{

    public function gallery($path)
    {
        return view('gallery', compact('path'));
    }

    public function getIconsByCat($path, $langId)
    {

        $gallery = Gallery::with('icons')
        ->where('path', $path)
        ->where('lang_id', $langId)->get();

        return $gallery;

    }

    public function showIcon($path, $id)
    {
        return view('icon', compact('path', 'id'));
    }

    public function getIcon($id, $lang)
    {

        $icon = Icon::with(array('gallery' => function($query) {
            $query->select('id', 'path');
        }))
        ->where('id', $id)
        ->where('lang_id', $lang)
        ->firstOrFail();

        $formats = [
        'a3' => $icon->a3,
        'a4' => $icon->a4,
        'a5' => $icon->a5
        ];
        return $data = compact('icon', 'formats');
    }

    public function getGalleries($id)
    {
        return Gallery::where('lang_id', $id)->get();
    }

}
