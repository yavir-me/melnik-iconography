<?php

namespace App\Http\Controllers\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Icon;
use \Carbon\Carbon;

class NewIconController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticated');
    }

    public function show($gallery = null)
    {
        return view('admin.new-icon', compact('gallery'));
   }


    public function create(Request $request)
    {
        // upload image
        $extension = $request->image->extension();
        if (in_array(strtolower($extension), ['jpg', 'jpeg'])) {
            $path = $request->image->store('/img/galleries/' . $request->get('path'), 'custom-public');
            chmod($path, 0744);
        }

        $data = $request->all();
        $data['image_path'] = $path;
        $data['gallery_path'] = $request->get('path');

        $this->createIcon($data);

        return back()->withErrors(['message' => 'Работа добавлена']);
    }

    public function createIcon($data)
    {

        $langs = [
        'ru' => 2,
        'ua' => 1,
        'en' => 3
        ];


        $galleries = Gallery::where('path', $data['gallery_path'])->get();

        foreach ($langs as $k => $v) {
            foreach ($galleries as $gallery) {
                if ($gallery->lang_id === $v) {
                    $galleryId = $gallery->id;
                }
            }

            Icon::create([
                'title' => $data['title_'.$k],
                'description' => $data['description_'.$k],
                'lang_id' => $v,
                'path' => $data['image_path'],
                'gallery_id' => $galleryId,
                'a3' => $data['a3'],
                'a4' => $data['a4'],
                'a5' => $data['a5'],
                'meta_keywords' => $data['meta_keywords_'.$k],
                'meta_description' => $data['meta_description_'.$k],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
        }

    }

}