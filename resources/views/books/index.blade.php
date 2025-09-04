@extends('layouts.app')

@section('title', 'All Books')

@section('content')
<h2>All Book Reviews</h2>
<ul>
    @foreach($books as $book)
        <li>{{ $book->title }} by {{ $book->author }}</li>
    @endforeach
</ul>
@endsection
