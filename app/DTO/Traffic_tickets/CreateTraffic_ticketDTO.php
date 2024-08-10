<?php

namespace App\DTO\Traffic_tickets;

class CreateTraffic_ticketDTO
{
    public function __construct(
        readonly public string $borrowed_book_id,
        readonly public string $student_id,
        readonly public ?string $debt = '',
        readonly public ?string $state = '',
    ) {
        //
    }
}
