<?php

namespace App\Repositories;

use App\Models\Book_return;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DTO\Book_returns\EditBook_returnDTO;
use App\DTO\Book_returns\CreateBook_returnDTO;

class Book_returnRepository
{
    public function __construct(protected Book_return $book_return)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->book_return->where(function ($query) use ($filter) {

            if ($filter !== '') {
                $query->where('book_id', 'LIKE', "%{$filter}%");
                $query->where('student_id', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew($request): Book_return
    {
        $data_actual = date('Y-m-d H:i:s');
         //Traz os dados do usuario logado
        $user = Auth::user();
        $book_return = Book_return::create([
            'borrowed_book_id' => $request['borrowed_book_id'],
            'student_id' => $request['student_id'],
            'user_id' => $user->id,
            'book_id'  => $request['book_id'],
            'return_date'  => $data_actual,
            'observation'  => $request['observation'],
        ]);
        return $book_return;
    }

    public function findById(string $id): ?Book_return
    {
        return $this->book_return->find($id);
    }


    public function delete(string $id){

        if (!$book_return = $this->findById($id)) {
            return false;
        }
        return $book_return->delete();
    }
}
