<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\DTO\Categories\EditCategoryDTO;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use App\DTO\Categories\CreateCategoryDTO;
use App\Http\Requests\Api\Category\StoreUpdateCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(private CategoryRepository $categoryRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorys = $this->categoryRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return CategoryResource::collection($categorys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->createNew(new CreateCategoryDTO(... $request->validated()));
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$category = $this->categoryRepository->findById($id)){
            return response()->json(['message' => 'category not found'], Response::HTTP_NOT_FOUND);
        }
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoryRequest $request, string $id)
    {
       $response =$this->categoryRepository->update(new EditCategoryDTO(...[$id, ...$request->validated()]));
        if(!$response){
            return response()->json(['message' => 'category not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'category updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->categoryRepository->delete($id)){
            return response()->json(['message' => 'category not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
