<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Book::with('category');

        // Search Judul
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Filter Category
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->get();

        $totalBooks = $books->count();
        $totalPerCategory = Book::selectRaw('category_id, count(*) as total')
                                ->groupBy('category_id')
                                ->get();

        return view('books.index', compact(
            'books',
            'categories',
            'totalBooks',
            'totalPerCategory'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|numeric',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // validasi image max 2MB
        ]);

        $data = $request->all();

        // Upload cover image jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        Book::create($data);

        return redirect()->route('books.index')
                        ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|numeric',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Upload cover image jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')
                        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
                ->with('success','Data berhasil dihapus');
    }
}