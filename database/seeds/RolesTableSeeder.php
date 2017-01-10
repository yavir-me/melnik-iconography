<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('roles')->insert([
        'slug' => 'client',
        'name' => 'Client'
        ]);

    DB::table('roles')->insert([
        'slug' => 'admin',
        'name' => 'Admin'
        ]);
    }
}
