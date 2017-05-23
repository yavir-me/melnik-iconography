<?php

namespace App\Http\Controllers\Artisan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Icon;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticated');
    }

    public function show($path)
    {

        $gallery = Gallery::with('icons')
        ->where('path', $path)
        ->where('lang_id', 2)
        ->firstOrFail();

        return view('admin.gallery', compact('gallery'));
    }

    public function destroy($id)
    {
        $icon = Icon::where('id', $id)->firstOrFail();

        return Icon::where('path', $icon->path)->delete();
    }

    public function update($gallery = null, $id)
    {
        
    }

}
