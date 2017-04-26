<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $table = 'galleries';

    public static function getGalleries()
    {
        return Category::where('lang_id', 3)->get();
    }

    public static function getByGallery($gallery)
    {
        // $langId = Language::where('language', app()->getLocale())->first(['language']);

        // return Category::where('path', $category)-> //use relationship here
        // ->where('lang_id', $langId)->first();
    }

    public function lang()
    {
        $this->hasOne('App\Language');
    }

    public function icons()
    {
        return $this->hasMany(Icon::class);
    }

}
