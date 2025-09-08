@extends('layouts.app')

@section('title', 'Laravel Book Review')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <h1>📚 Discover Your Next Favorite Book</h1>
        <p>Explore reviews, ratings, and recommendations from passionate readers.</p>
        <a href="{{ route('books.index') }}" class="btn-primary">Browse All Books</a>
    </div>
</div>

<div class="section-title">
    <h2>🔥 Trending Reviews</h2>
</div>

<div class="book-grid">
    @forelse($books as $book)
        <div class="book-card">
            {{-- <img src="{{ $book->cover_url }}" alt="{{ $book->title }}"> --}}
            <div class="book-info">
                <h3>{{ $book->title }}</h3>
                <p class="author">by {{ $book->author }}</p>
                <p class="rating">⭐ {{ $book->rating }}/5</p>
                <a href="{{ route('books.show', $book->id) }}" class="btn-secondary">Read Review</a>
            </div>
        </div>
    @empty
        <p class="no-books">No books found. Add some reviews to get started!</p>
    @endforelse
</div>
@endsection
