<?php

use TeachMe\Entities\Ticket;
use Faker\Factory as Faker;

class TicketSeeder extends BaseSeeder
{

    protected $total = 50;

    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData($faker)
    {
        return [
            'title' => $faker->sentence(),
            'status' => $faker->randomElement(['open','open','closed']),
            'user_id' => $this->getRandom('User')->id,
            'category_id' => $this->getRandom('TicketCategory')->id
        ];
    }


}
