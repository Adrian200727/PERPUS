



<h1>{{ $book->title }}</h1>
<p>{{ $book->author }}</p>
<p>{{ $book->description }}</p>
<p>Stok: {{ $book->stock }}</p>

<form action="{{ route('books.borrow', $book->id) }}" method="POST">
    @csrf
    <button type="submit" {{ $book->stock == 0 ? 'disabled' : '' }}>Pinjam Buku</button>
</form>

<form action="{{ route('books.return', $book->id) }}" method="POST">
    @csrf
    <button type="submit">Kembalikan Buku</button>
</form>
