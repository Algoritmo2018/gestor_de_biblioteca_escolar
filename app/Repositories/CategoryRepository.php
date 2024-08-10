<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use App\Models\category;
use App\DTO\Categories\CreateCategoryDTO;
use App\DTO\Categories\EditCategoryDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function __construct(protected Category $category)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->category->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('category', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateCategoryDTO $dto): Category
    {
        $data = (array) $dto;
        return $this->category->create($data);
    }

    public function findById(string $id): ?Category
    {
        return $this->category->find($id);
    }

    public function update(EditCategoryDTO $dto): bool
    {
        if (!$category = $this->findById($dto->id)) {
            return false;
        }
        $data = (array) $dto;
        return $category->update($data);
    }
    public function delete(string $id){

        if (!$category = $this->findById($id)) {
            return false;
        }   //Elimina uma categoria todos os livros que estão associados a essa categoria e elimina todos os emprestimos referenciados a este livro
        $books = $category->book;
        foreach ($books as $book) {
            $book->borrowed_book()->each(function ($borrowed_book) {
                $borrowed_book->traffic_ticket()->delete();
                $borrowed_book->book_return()->delete();
            });
            //Apaga a imagem do livro
            File::delete('storage/img/book_cap/' . $book->image_path);
            $book->delete();
        }
        return $category->delete();
    }
}
