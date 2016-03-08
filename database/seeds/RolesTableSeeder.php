<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Role();
        $user->name         = 'affiliate';
        $user->display_name = 'Project Affiliate'; // optional
        $user->save();

        $affiliate = new Role();
        $affiliate->name         = 'user';
        $affiliate->display_name = 'Project User'; // optional
        $affiliate->save();
    }
}
