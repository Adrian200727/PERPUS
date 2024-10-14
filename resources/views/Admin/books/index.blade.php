@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Tambah Buku</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td> 
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
@endsection