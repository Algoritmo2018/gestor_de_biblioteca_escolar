<?php

namespace App\Repositories;

use App\Models\Borrowed_book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DTO\Borrowed_books\EditBorrowed_bookDTO;
use App\DTO\Borrowed_books\CreateBorrowed_bookDTO;

class Borrowed_bookRepository
{
    public function __construct(protected Borrowed_book $borrowed_book)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->borrowed_book->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('book_id', 'LIKE', "%{$filter}%");
                $query->where('student_id', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew($request): Borrowed_book
    {

         //Traz os dados do usuario logado
        $user = Auth::user();
        $borrowed_book = Borrowed_book::create([
            'student_id' => $request['student_id'],
            'user_id' => $user->id,
            'book_id'  => $request['book_id'],
            'date_borrowed'  => $request['date_borrowed'],
            'return_date'  => $request['return_date'],
            'observation'  => $request['observation'],
        ]);


        return $borrowed_book;
    }

    public function findById(string $id): ?Borrowed_book
    {
        return $this->borrowed_book->find($id);
    }

  
    public function delete(string $id){

        if (!$borrowed_book = $this->findById($id)) {
            return false;
        }
        return $borrowed_book->delete();
    }
}
