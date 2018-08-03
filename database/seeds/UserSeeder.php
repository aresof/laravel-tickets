<?php

use TeachMe\Entities\User;
use Faker\Factory as Faker;

class UserSeeder extends BaseSeeder
{

    public function getModel()
    {
        return new User();
    }

    public function getDummyData($faker)
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret')
        ];
    }

    public function createAdmin()
    {

        User::create([
            'name' => 'Arturo',
            'email' => 'arturo@arturo.es',
            'password' => bcrypt('admin')
        ]);
    }

    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(50);

    }

}
