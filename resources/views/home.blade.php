@extends('layouts.app')

@section('content')

<!-- Hero / Banner -->
<div class="position-relative mb-5" style="height: 400px; background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;">
    <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 bg-dark bg-opacity-50 text-white">
        <h1 class="display-4 fw-bold">My Book Library</h1>
        <p class="fs-5">Temukan koleksi buku terbaik untuk kamu</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg mt-3">Lihat Semua Buku</a>
    </div>
</div>

<!-- Koleksi Buku Terbaru -->
<div class="container mb-5">
    <h3 class="mb-4 text-center">📚 Koleksi Buku Terbaru</h3>
    <div class="row g-4">
        @foreach($books as $book)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
                @if($book->image)
                <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->judul }}" style="height: 250px; object-fit: cover;">
                @else
                <img src="https://via.placeholder.com/250x250?text=No+Cover" class="card-img-top" alt="No Cover" style="height: 250px; object-fit: cover;">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text">{{ $book->penulis }}</p>
                    @if($book->tahun_terbit)
                    <span class="badge bg-primary">{{ $book->tahun_terbit }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection