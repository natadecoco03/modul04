@extends('layouts.app')

@section('content')

<h3>Tambah Kategori</h3>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection