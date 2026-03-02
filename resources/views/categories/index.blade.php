@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->nama_kategori }}</td>
            <td>{{ $category->deskripsi }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin mau hapus?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection