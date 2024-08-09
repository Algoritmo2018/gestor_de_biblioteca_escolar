<?php

namespace App\Repositories;

use App\Models\Traffic_ticket;
use App\DTO\Traffic_tickets\EditTraffic_ticketDTO;
use App\DTO\Traffic_tickets\CreateTraffic_ticketDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Traffic_ticketRepository
{
    public function __construct(protected Traffic_ticket $traffic_ticket)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->traffic_ticket
        ->with('borrowed_book')
        ->with('student')
        ->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('student_id', 'LIKE', "%{$filter}%");
                $query->where('borrowed_book_id', 'LIKE', "%{$filter}%");
            }

        })

        ->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateTraffic_ticketDTO $dto): Traffic_ticket
    {

        $data = (array) $dto;

        $data['debt'] = 1000;
        $data['state'] = "on";

        return $this->traffic_ticket->create($data);
    }

    public function findById(string $id): ?Traffic_ticket
    {
        return $this->traffic_ticket->find($id);
    }

    public function update($id, $request): bool
    {
        if (!$traffic_ticket = $this->findById($id)) {
            return false;
        }
        if(!empty($request['borrowed_book_id'])){
            $traffic_ticket->borrowed_book_id = $request['borrowed_book_id'];
        }
        if(!empty($request['student_id'])){
            $traffic_ticket->student_id = $request['student_id'];
        }
        if(!empty($request['state'])){
            $traffic_ticket->state = $request['state'];
        }


        return $traffic_ticket->save();
    }
    public function delete(string $id){

        if (!$traffic_ticket = $this->findById($id)) {
            return false;
        }


        return $traffic_ticket->delete();
    }
}
