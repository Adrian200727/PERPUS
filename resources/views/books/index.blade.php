@extends('layouts.admin')



@section('content')
<div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <h1>Daftar Buku</h1>
    @foreach($books as $book)
    <div>
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->author }}</p>
        <p>Stok: {{ $book->stock }}</p>
        <a href="{{ route('books.show', $book->id) }}">Lihat Detail</a>
    </div>
    @endforeach
</div>
@endsection