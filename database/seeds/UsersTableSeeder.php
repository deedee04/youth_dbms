<?php

use Illuminate\Database\Seeder;
// use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin User',
            'email' => 'admin@youth',
            'password' => bcrypt(1234567),
            'created_at' => now(),
            'updated_at' => now(),],
            ['name' => 'Guest User',
            'email' => 'guest@youth',
            'password' => bcrypt(1234567),
            'created_at' => now(),
            'updated_at' => now(),]
        ]);
    }
}
