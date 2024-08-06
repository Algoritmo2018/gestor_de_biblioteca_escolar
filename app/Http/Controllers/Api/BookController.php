<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DTO\Books\EditBookDTO;
use App\DTO\Books\CreateBookDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Api\Book\StoreUpdateBookRequest;

class BookController extends Controller
{

    public function __construct(private BookRepository $bookRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = $this->bookRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateBookRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'image_path' => 'required|mimes:png,jpg,jpeg,gif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Please fix the errors',
                'errors' => $validator->errors()
            ]);
        }
        $imagePath = $request->file('image_path')->store('public/img/book_cap');
        $imageName = $request->file('image_path')->hashName();

        $book = $this->bookRepository->createNew(new CreateBookDTO(... $request->validated()),$imageName);
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$book = $this->bookRepository->findById($id)){
            return response()->json(['message' => 'book not found'], Response::HTTP_NOT_FOUND);
        }
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateBookRequest $request, string $id)
    {
       $response =$this->bookRepository->update(new EditBookDTO(...[$id, ...$request->validated()]));
        if(!$response){
            return response()->json(['message' => 'book not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'book updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->bookRepository->delete($id)){
            return response()->json(['message' => 'book not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
