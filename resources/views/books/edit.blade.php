@extends('layouts.app')

@section('content')

<h3>Edit Book</h3>

<div class="card">
<div class="card-body">

<form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" value="{{ $book->judul }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" value="{{ $book->penulis }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $book->stok }}" class="form-control">
    </div>

    <!-- Cover Image -->
    <div class="mb-3">
        <label>Cover Buku</label>
        <input type="file" name="image" class="form-control">
        @if($book->image)
            <img src="{{ asset('storage/' . $book->image) }}" alt="Cover" width="150" class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@endsection