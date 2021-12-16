<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create([
            'name' => "Admin Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('password'),
            'credit_limit' => -1,
            'role' => "Admin"
        ]);
        User::create([
            'name' => "Client One",
            'email' => "client1@client.com",
            'password' => bcrypt('password'),
            'credit_limit' => -1,
            'role' => "Client"
        ]);
        User::create([
            'name' => "Client Two",
            'email' => "client2@client.com",
            'password' => bcrypt('password'),
            'credit_limit' => -1,
            'role' => "Client"
        ]);
    }
}
