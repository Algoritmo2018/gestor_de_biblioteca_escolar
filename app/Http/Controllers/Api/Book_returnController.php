<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DTO\Book_returns\EditBook_returnDTO;
use App\DTO\Book_returns\CreateBook_returnDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book_return\StoreBook_returnRequest;
use App\Http\Resources\Book_returnResource;
use App\Repositories\Book_returnRepository;
use Illuminate\Support\Facades\Validator;

class Book_returnController extends Controller
{

    public function __construct(private Book_returnRepository $book_returnRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $book_returns = $this->book_returnRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return Book_returnResource::collection($book_returns);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook_returnRequest $request)
    {

        $book_return = $this->book_returnRepository->createNew($request->all());
        return new Book_returnResource($book_return);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$book_return = $this->book_returnRepository->findById($id)) {
            return response()->json(['message' => 'book_return not found'], Response::HTTP_NOT_FOUND);
        }
        return new Book_returnResource($book_return);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (!$this->book_returnRepository->delete($id)) {
            return response()->json(['message' => 'book_return not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
