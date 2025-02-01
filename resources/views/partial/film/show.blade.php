@extends('layout.master')

@section('judul')
<h2>{{ $film->title }}</h2>
@endsection

@section('content')
<div class="container mt-5">
    <div class="card mb-4">
        <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }} Poster">
        <div class="card-body">
            <h5>{{ $film->title }}</h5>
            <p><strong>Summary:</strong> {{ $film->summary }}</p>
            <p><strong>Genres:</strong> 
                @foreach($film->genres as $genre)
                    {{ $genre->name }}@if (!$loop->last), @endif
                @endforeach
            </p>
        </div>
    </div>

    <h3>Reviews</h3>
    @foreach($film->reviews as $review)
        <div class="mb-3">
            <strong>{{ $review->user->name }}</strong> ({{ $review->point }} stars)
            <p>{{ $review->content }}</p>
        </div>
    @endforeach

    @auth
    <h4>Add Review</h4>
    <form action="{{ route('reviews.store', $film->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Review Content</label>
            <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="point">Rating (1-5)</label>
            <select name="point" id="point" class="form-control">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
    </form>
    @endauth
</div>
@endsection
