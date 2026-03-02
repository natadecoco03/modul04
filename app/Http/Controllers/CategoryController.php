<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Form tambah data
    public function create()
    {
        return view('categories.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // Form edit
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update data
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    // Hapus data
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}