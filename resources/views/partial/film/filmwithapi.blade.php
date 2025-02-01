@extends('layout.master')

@section('judul')
    <header>
        <h1>Daftar Film</h1>
    </header>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($films['results'] as $film)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if(isset($film['poster_path']) && $film['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w200{{ $film['poster_path'] }}" alt="{{ $film['title'] }} Poster"><br>
                    @else
                        <p>No poster available</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $film['title'] }}</h5>
                        <p class="card-text">Rating: {{ $film['vote_average'] }}</p>
                        <p class="card-text">Release Date: {{ $film['release_date'] }}</p>
                        <p class="card-text">
                            Genre: 
                            @foreach($film['genre_ids'] as $genreId)
                                {{ $genreMap[$genreId] ?? 'Unknown' }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection