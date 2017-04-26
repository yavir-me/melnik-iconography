<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class Category extends Model
{

    protected $table = 'categories';

    public static function getCategories()
    {
        return Category::where('lang_id', 3)->get();
    }

    public static function getByCategory($category)
    {
        // $langId = Language::where('language', app()->getLocale())->first(['language']);

        // return Category::where('path', $category)-> //use relationship here
        // ->where('lang_id', $langId)->first();
    }

    public function langs()
    {
        $this->hasOne('App\Language');
    }
}
