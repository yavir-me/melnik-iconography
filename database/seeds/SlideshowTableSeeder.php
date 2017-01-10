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
            'name' => 'Objects painiting',
            'path' => 'img/slideshow/1.jpg',
            ]);

        DB::table('slideshow')->insert([
            'name' => 'Piece of soul',
            'path' => 'img/slideshow/2.jpg',
            ]);

        DB::table('slideshow')->insert([
            'name' => 'I\'m on the way',
            'path' => 'img/slideshow/3.jpg',
            ]);

        DB::table('slideshow')->insert([
            'name' => 'Quality materials',
            'path' => 'img/slideshow/4.jpg',
            ]);

    }
}
