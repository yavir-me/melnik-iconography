<?php

use Illuminate\Database\Seeder;

class SlideshowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('slideshow')->insert([
            'title' => 'Objects painiting',
            'path' => 'img/slideshow/1.jpg',
            'lang_id' => 1
            ]);

        DB::table('slideshow')->insert([
            'title' => 'Piece of soul',
            'path' => 'img/slideshow/2.jpg',
            'lang_id' => 1
            ]);

        DB::table('slideshow')->insert([
            'title' => 'I\'m on the way',
            'path' => 'img/slideshow/3.jpg',
            'lang_id' => 1
            ]);

        DB::table('slideshow')->insert([
            'title' => 'Quality materials',
            'path' => 'img/slideshow/4.jpg',
            'lang_id' => 1
            ]);

    }
}
