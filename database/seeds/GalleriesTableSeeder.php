<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // en
        DB::table('galleries')->insert([
            'name' => 'Jesus Christ',
            'path' => 'jesus-christ',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Mother of God',
            'path' => 'mother-of-god',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Virgin Mary With Jesus',
            'path' => 'virgin-mary-with-jesus',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Wedding Icons',
            'path' => 'wedding-icons',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Antique Icon',
            'path' => 'antique-icon',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Major Holy Days',
            'path' => 'major-holy-days',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Modern Icon',
            'path' => 'modern-icon',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Nominal Icons',
            'path' => 'nominal-icons',
            'lang_id' => '3',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Dimensional Icons',
            'path' => 'deminsional-icons',
            'lang_id' => '3',
            ]);

        // ru
        DB::table('galleries')->insert([
            'name' => 'Исус Христос',
            'path' => 'jesus-christ',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Богородица',
            'path' => 'mother-of-god',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Богородица с Исусом',
            'path' => 'virgin-mary-with-jesus',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Венчальные Пары',
            'path' => 'wedding-icons',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Античная Икона',
            'path' => 'antique-icon',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Праздники и Сюжеты',
            'path' => 'major-holy-days',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Современная Икона',
            'path' => 'modern-icon',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Именные Иконы',
            'path' => 'nominal-icons',
            'lang_id' => '2',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Мерные иконы',
            'path' => 'deminsional-icons',
            'lang_id' => '2',
            ]);

        // ua
        DB::table('galleries')->insert([
            'name' => 'Ісус Христос',
            'path' => 'jesus-christ',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Богородиця',
            'path' => 'mother-of-god',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Богородиця з Ісусом',
            'path' => 'virgin-mary-with-jesus',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Вінчальні Пари',
            'path' => 'wedding-icons',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Антична Ікона',
            'path' => 'antique-icon',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Свята та сюжети',
            'path' => 'major-holy-days',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Сучасна Ікона',
            'path' => 'modern-icon',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Іменні Ікони',
            'path' => 'nominal-icons',
            'lang_id' => '1',
            ]);
        DB::table('galleries')->insert([
            'name' => 'Мірні Ікони',
            'path' => 'deminsional-icons',
            'lang_id' => '1',
            ]);
    }
}
