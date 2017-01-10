<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IconsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SlideshowTableSeeder::class);
    }
}
