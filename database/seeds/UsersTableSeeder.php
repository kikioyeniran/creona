<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_users')->truncate();

        $adminRole = Roles::where('name', 'admin')->first();
        $artistRole = Roles::where('name', 'artist')->first();
        $customerRole = Roles::where('name', 'customer')->first();

        $admin = User::create([
            'name' => 'Kiki Admin',
            'email' => 'admin@creonaart.com',
            'password' => Hash::make('cAncel78$')
        ]);
        $artist = User::create([
            'name' => 'Kiki Artist',
            'email' => 'artist@creonaart.com',
            'password' => Hash::make('cAncel78$')
        ]);
        $customer = User::create([
            'name' => 'Kiki Customer',
            'email' => 'customer@creonaart.com',
            'password' => Hash::make('cAncel78$')
        ]);

        $admin->roles()->attach($adminRole);
        $artist->roles()->attach($artistRole);
        $customer->roles()->attach($customerRole);
    }
}
