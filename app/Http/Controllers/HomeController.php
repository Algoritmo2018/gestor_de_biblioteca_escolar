<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $book){
        $book = $book->simplepaginate(50);
        return view('index', compact('book'));
    }
}
