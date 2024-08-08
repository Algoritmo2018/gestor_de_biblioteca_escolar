<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DTO\Borrowed_books\EditBorrowed_bookDTO;
use App\DTO\Borrowed_books\CreateBorrowed_bookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Borrowed_book\StoreBorrowed_bookRequest;
use App\Http\Resources\Borrowed_bookResource;
use App\Repositories\Borrowed_bookRepository;
use App\Http\Requests\Api\Borrowed_book\StoreUpdateBorrowed_bookRequest;

class Borrowed_bookController extends Controller
{

    public function __construct(private Borrowed_bookRepository $borrowed_bookRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $borrowed_books = $this->borrowed_bookRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return Borrowed_bookResource::collection($borrowed_books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowed_bookRequest $request)
    {
        $data_actual = date('Y-m-d H:i:s');
if($request->date_borrowed < $data_actual){
    return response()->json([
        'message' => 'the loan date must be greater than or equal to the current date',
        Response::HTTP_NOT_FOUND
    ]);
}

        //Verifica si a data de devolução é maior que a data de emprestimo
        if ($request->date_borrowed > $request->return_date) {
            return response()->json([
                'message' => 'The return date must be greater than the loan date',
                Response::HTTP_NOT_FOUND
            ]);
        }
        $borrowed_book = $this->borrowed_bookRepository->createNew($request->all());
        return new Borrowed_bookResource($borrowed_book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$borrowed_book = $this->borrowed_bookRepository->findById($id)) {
            return response()->json(['message' => 'borrowed_book not found'], Response::HTTP_NOT_FOUND);
        }
        return new Borrowed_bookResource($borrowed_book);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (!$this->borrowed_bookRepository->delete($id)) {
            return response()->json(['message' => 'borrowed_book not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
