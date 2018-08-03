<?php
use TeachMe\Entities\TicketVote;

class TicketVoteSeeder extends BaseSeeder
{

    protected $total = 50;

    public function getModel()
    {
        return new TicketVote();
    }

    public function getDummyData($faker)
    {
        return [
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }

}

