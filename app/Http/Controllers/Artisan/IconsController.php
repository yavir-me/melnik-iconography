<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Icon;
use App\Gallery;
use \Carbon\Carbon;

class IconsController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticated');
    }

    public function show($gallery = null, $id)
    {
        $icon = Icon::where('id', $id)->firstOrFail();
        $iconsPack = Icon::with('gallery')->where('path', $icon->path)->get();
        $icons = [];

        $path = [
        'gallery' => $gallery,
        'id' => $id,
        'path' => $icon->path
        ];

        foreach ($iconsPack as $cur) {
            if ($cur->lang_id == 1) {
                $icons['ua'] = $cur;
            } else if ($cur->lang_id == 2) {
                $icons['ru'] = $cur;
            } else if ($cur->lang_id == 3) {
                $icons['en'] = $cur;
            }
        }

        return view('admin.icon', compact('icons', 'path'));
    }

    public function update()
    {
        $gallery = Gallery::where('path', request()->get('gallery_name'))
        ->where('lang_id', request()->get('lang_id'))
        ->firstOrFail();

        if (request()->get('id')) {
            Icon::where('id', request()->get('id'))
            ->update([
                'title' => request()->get('title'),
                'description' => request()->get('description'),
                'lang_id' => request()->get('lang_id'),
                'gallery_id' => $gallery->id,
                'a3' => request()->get('a3'),
                'a4' => request()->get('a4'),
                'a5' => request()->get('a5'),
                'meta_keywords' => request()->get('meta_keywords'),
                'meta_description' => request()->get('meta_description'),
                'updated_at' => Carbon::now()
                ]);
        } else {

            Icon::create([
                'title' => request()->get('title'),
                'description' => request()->get('description'),
                'lang_id' => request()->get('lang_id'),
                'path' => request()->get('path'),
                'gallery_id' => $gallery->id,
                'a3' => request()->get('a3'),
                'a4' => request()->get('a4'),
                'a5' => request()->get('a5'),
                'meta_keywords' => request()->get('meta_keywords'),
                'meta_description' => request()->get('meta_description'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
        }

        return back()->withErrors([
            'updated' => 'Работу обновлено'
            ]);
    }

}
