<?php

use Illuminate\Database\Seeder;

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
            'mobile' => '0450927366'
        ]);

        DB::table('users')->insert([
            'mobile' => '1234567890'
        ]);
    }
}
