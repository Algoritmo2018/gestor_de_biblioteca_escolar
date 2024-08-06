<?php

namespace App\Repositories;

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
        return $this->book->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('title', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
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

    public function update(EditBookDTO $dto): bool
    {
        if (!$book = $this->findById($dto->id)) {
            return false;
        }
        $data = (array) $dto;
        return $book->update($data);
    }
    public function delete(string $id){

        if (!$book = $this->findById($id)) {
            return false;
        }
        return $book->delete();
    }
}
