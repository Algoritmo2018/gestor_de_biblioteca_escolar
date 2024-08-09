<?php

namespace App\DTO\Traffic_tickets;

class EditTraffic_ticketDTO
{
    public function __construct(
        readonly public string $id,
        readonly public string $borrowed_book_id,
        readonly public string $student_id, 
        readonly public string $state,
    ) {
        //
    }
}
