<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use App\Models\Book;
use App\DTO\Books\EditBookDTO;
use App\DTO\Books\CreateBookDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository
{
    public function __construct(protected Book $book)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->book
        ->with('author')
        ->with('category')
        ->with('publishing_company')
        ->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('title', 'LIKE', "%{$filter}%");
            }

        })

        ->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateBookDTO $dto, string $path): Book
    {

        $data = (array) $dto;

          $data['image_path'] = $path;

        return $this->book->create($data);
    }

    public function findById(string $id): ?Book
    {
        return $this->book->find($id);
    }

    public function update($id, $request): bool
    {
        if (!$book = $this->findById($id)) {
            return false;
        }
        if(!empty($request['title'])){
            $book->title = $request['title'];
        }
        if(!empty($request['author_id'])){
            $book->author_id = $request['author_id'];
        }
        if(!empty($request['category_id'])){
            $book->category_id = $request['category_id'];
        }
        if(!empty($request['publishing_company_id'])){
            $book->publishing_company_id = $request['publishing_company_id'];
        }
        if(!empty($request['number_of_copies'])){
            $book->number_of_copies = $request['number_of_copies'];
        }
        if(!empty($request['year_of_publication'])){
            $book->year_of_publication = $request['year_of_publication'];
        }


        return $book->save();
    }
    public function delete(string $id){

        if (!$book = $this->findById($id)) {
            return false;
        }

        // Delecta a imagem x que esta na pasta storage/app/public/img/book_cap/
        File::delete('storage/img/book_cap/' . $book->image_path);

        return $book->delete();
    }
}
