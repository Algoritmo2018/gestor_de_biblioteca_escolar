<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublishingCompanyResource;
use App\Repositories\PublishingCompanyRepository;
use App\DTO\PublishingCompanies\EditPublishingCompanyDTO;
use App\DTO\PublishingCompanies\CreatePublishingCompanyDTO;
use App\Http\Requests\Api\PublishingCompany\StoreUpdatePublishingCompanyRequest;

class PublishingCompanyController extends Controller
{

    public function __construct(private PublishingCompanyRepository $PublishingCompanyRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $PublishingCompanies = $this->PublishingCompanyRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return PublishingCompanyResource::collection($PublishingCompanies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePublishingCompanyRequest $request)
    {
        $publishing_company = $this->PublishingCompanyRepository->createNew(new CreatePublishingCompanyDTO(... $request->validated()));
        return new PublishingCompanyResource($publishing_company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$PublishingCompany = $this->PublishingCompanyRepository->findById($id)){
            return response()->json(['message' => 'PublishingCompany not found'], Response::HTTP_NOT_FOUND);
        }
        return new PublishingCompanyResource($PublishingCompany);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePublishingCompanyRequest $request, string $id)
    {
       $response =$this->PublishingCompanyRepository->update(new EditPublishingCompanyDTO(...[$id, ...$request->validated()]));
        if(!$response){
            return response()->json(['message' => 'PublishingCompany not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'PublishingCompany updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!$this->PublishingCompanyRepository->delete($id)){
            return response()->json(['message' => 'PublishingCompany not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

