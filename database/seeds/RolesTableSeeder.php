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
        'slub' => 'client',
        'name' => 'Client'
        ]);

    DB::table('roles')->insert([
        'slub' => 'admin',
        'name' => 'Admin'
        ]);
    }
}
