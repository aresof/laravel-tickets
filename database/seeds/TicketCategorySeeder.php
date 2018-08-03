<?php

use TeachMe\Entities\TicketCategory;

class TicketCategorySeeder extends BaseSeeder
{
    protected $total = 20;

    public function getModel()
    {
        return new TicketCategory();
    }

    public function getDummyData($faker)
    {
        return [
            'description' => $faker->sentence(3)
        ];
    }

}