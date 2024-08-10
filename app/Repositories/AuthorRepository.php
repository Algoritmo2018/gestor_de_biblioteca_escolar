<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use App\Models\author;
use App\DTO\Authors\CreateAuthorDTO;
use App\DTO\Authors\EditAuthorDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorRepository
{
    public function __construct(protected Author $author)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->author->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('author', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateAuthorDTO $dto): Author
    {
        $data = (array) $dto;
        return $this->author->create($data);
    }

    public function findById(string $id): ?Author
    {
        return $this->author->find($id);
    }

    public function update(EditAuthorDTO $dto): bool
    {
        if (!$author = $this->findById($dto->id)) {
            return false;
        }
        $data = (array) $dto;
        return $author->update($data);
    }
    public function delete(string $id){

        if (!$author = $this->findById($id)) {
            return false;
        }
         //Elimina um autor todos os livros que estão associados a esse autor e elimina todos os emprestimos referenciados a este livro
         $books = $author->book;
         foreach ($books as $book) {
             $book->borrowed_book()->each(function ($borrowed_book) {
                 $borrowed_book->traffic_ticket()->delete();
                 $borrowed_book->book_return()->delete();
             });
             //Apaga a imagem do livro
             File::delete('storage/img/book_cap/' . $book->image_path);
             $book->delete();
         }
        return $author->delete();
    }
}
