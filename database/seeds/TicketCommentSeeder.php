<?php

use TeachMe\Entities\TicketComment;

class TicketCommentSeeder extends BaseSeeder
{

    protected $total = 50;

    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData($faker)
    {
        return [
            'comment' => $faker->paragraph(),
            'link' => $faker->randomElement(['','',$faker->url()]),
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }

}
