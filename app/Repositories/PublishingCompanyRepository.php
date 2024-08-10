<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use App\Models\Publishing_company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DTO\PublishingCompanies\EditPublishingCompanyDTO;
use App\DTO\PublishingCompanies\CreatePublishingCompanyDTO;

class PublishingCompanyRepository
{
    public function __construct(protected Publishing_company $PublishingCompany) {}

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->PublishingCompany->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('PublishingCompany', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreatePublishingCompanyDTO $dto): Publishing_company
    {
        $data = (array) $dto;
        return $this->PublishingCompany->create($data);
    }

    public function findById(string $id): ?Publishing_company
    {
        return $this->PublishingCompany->find($id);
    }

    public function update(EditPublishingCompanyDTO $dto): bool
    {
        if (!$PublishingCompany = $this->findById($dto->id)) {
            return false;
        }
        $data = (array) $dto;
        return $PublishingCompany->update($data);
    }
    public function delete(string $id)
    {

        if (!$PublishingCompany = $this->findById($id)) {
            return false;
        } //Elimina uma editora todos os livros que estão associados a esse editora e elimina todos os emprestimos referenciados a este livro e todos os registros de livros devolvidos
        $books = $PublishingCompany->book;
        foreach ($books as $book) {
            $book->borrowed_book()->each(function ($borrowed_book) {
                $borrowed_book->traffic_ticket()->delete();
                $borrowed_book->book_return()->delete();
            });
            //Apaga a imagem do livro
            File::delete('storage/img/book_cap/' . $book->image_path);
            $book->delete();
        }
        return $PublishingCompany->delete();
    }
}
