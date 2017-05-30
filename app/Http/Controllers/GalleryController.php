<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Icon;
use Meta;

class GalleryController extends Controller
{

    public function gallery($path)
    {

        $this->setMeta($path, 'gallery');

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
        $this->setMeta($path, 'icon', $id);

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

    public function getLangId()
    {

        if (isset($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        } else {
            $lang = 'ru';
        }

        $langs = [
        'ua' => 1,
        'ru' => 2,
        'en' => 3
        ];

        return $langs[$lang];
    }

    public function setMeta($path, $type, $id = null)
    {
        $langId = $this->getLangId();

        if ($type === 'gallery') {
            $meta = Gallery::where('path', $path)
            ->where('lang_id', $langId)
            ->firstOrFail();
        } else if($type === 'icon') {
            $meta = Icon::where('id', $id)
            ->where('lang_id', $langId)
            ->firstOrFail();
        }

        Meta::set('description', $meta['meta_description']);
        Meta::set('keywords', $meta['meta_keywords']);
    }

}
