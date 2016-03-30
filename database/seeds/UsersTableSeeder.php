<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * generate random affiliate
     * @return void
     */
    public function run()
    {

        for($i =0 ; $i<100;$i++){
        $user = new User();
        $user->mobile = rand(1000000000,9999999999);
        $user->display_name = str_random(6);
        $user->age = rand(18,75);
        $user->latitude = -33.876173+$this->getRandomArbitrary(-0.2,0.2);
        $user->longitude = 151.209859+$this->getRandomArbitrary(-0.2,0.2);

        $user->save();
        //find current role
        $role = Role::where('name','affiliate')->first();
        //attach it
        $user->attachRole($role );
        }

    }

    /**
     * Returns a random number between min (inclusive) and max (exclusive)
     */
    public function getRandomArbitrary($min, $max) {

        return $min + lcg_value()*(abs($max - $min));

    }
}
