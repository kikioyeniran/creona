<?php

use App\Roles;
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
        Roles::truncate();

        Roles::create(['name' => 'admin']);
        Roles::create(['name' => 'artist']);
        Roles::create(['name' => 'customer']);
    }
}
