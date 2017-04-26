<?php

use Illuminate\Database\Seeder;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langs')->insert([
            'language' => 'ua'
            ]);

        DB::table('langs')->insert([
            'language' => 'ru',
            ]);

        DB::table('langs')->insert([
            'language' => 'en',
            ]);

    }
}
