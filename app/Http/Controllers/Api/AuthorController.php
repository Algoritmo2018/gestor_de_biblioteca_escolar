<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DTO\Authors\EditAuthorDTO;
use App\DTO\Authors\CreateAuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Repositories\AuthorRepository;
use App\Http\Requests\Api\Author\StoreUpdateAuthorRequest;

class AuthorController extends Controller
{

    public function __construct(private AuthorRepository $authorRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = $this->authorRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return AuthorResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAuthorRequest $request)
    {
        $author = $this->authorRepository->createNew(new CreateAuthorDTO(... $request->validated()));
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$author = $this->authorRepository->findById($id)){
            return response()->json(['message' => 'author not found'], Response::HTTP_NOT_FOUND);
        }
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateAuthorRequest $request, string $id)
    {
       $response =$this->authorRepository->update(new EditAuthorDTO(...[$id, ...$request->validated()]));
        if(!$response){
            return response()->json(['message' => 'author not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'author updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->authorRepository->delete($id)){
            return response()->json(['message' => 'author not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
