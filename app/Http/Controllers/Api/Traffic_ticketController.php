<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DTO\Traffic_tickets\CreateTraffic_ticketDTO;
use App\Http\Requests\Api\StoreTraffic_ticketRequest;
use App\Http\Requests\Api\UpdateTraffic_ticketRequest;
use App\Http\Resources\Traffic_ticketResource;
use App\Repositories\Borrowed_bookRepository;
use App\Repositories\Traffic_ticketRepository;

class Traffic_ticketController extends Controller
{

    public function __construct(private Traffic_ticketRepository $traffic_ticketRepository, private Borrowed_bookRepository $borrowed_bookRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $traffic_tickets = $this->traffic_ticketRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );

        return Traffic_ticketResource::collection($traffic_tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTraffic_ticketRequest $request)
    {
        //Data atual
        $data_actual = date('Y-m-d H:i:s');
//Verifica si o prazo de entrega passou da validade
 $return_date = $this->borrowed_bookRepository->findById($request->borrowed_book_id)['return_date'];
 if($return_date > $data_actual){
    return response()->json(['message' => 'The return time has not been exceeded'], Response::HTTP_NOT_FOUND);
 }

        $traffic_ticket = $this->traffic_ticketRepository->createNew(new CreateTraffic_ticketDTO(... $request->validated()));
        return new Traffic_ticketResource($traffic_ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$traffic_ticket = $this->traffic_ticketRepository->findById($id)){
            return response()->json(['message' => 'traffic_ticket not found'], Response::HTTP_NOT_FOUND);
        }
        return new Traffic_ticketResource($traffic_ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTraffic_ticketRequest $request, string $id)
    {

       $response = $this->traffic_ticketRepository->update($id, $request->validated());

       if(!$response){
            return response()->json(['message' => 'traffic_ticket not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'traffic_ticket updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->traffic_ticketRepository->delete($id)){
            return response()->json(['message' => 'traffic_ticket not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

