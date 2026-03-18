<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(6)->get(); // ambil 6 buku terakhir
        $categories = Category::all();

        return view('home', compact('books', 'categories'));
    }
}