@extends('layout.master')
@section('judul')
<h2 class="mb-4">Film List</h2>
@endsection
@section('content')
<div class="container mt-5">
    <!-- Create Film Button -->
     @auth
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('films.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Create New Film
        </a>
    </div>
    @endauth

    <div class="row">

        <!-- Flash Message for success -->
        <!-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif -->

        @foreach($films as $film)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }} Poster"> 
                <!-- <img src="{{ asset($film->poster ?? 'default-poster.jpg') }}" class="card-img-top img-fluid" alt="Film Poster" style="height: 300px; object-fit: cover;"> -->
                <div class="card-body">
                    <h5 class="card-title">{{ $film->title }}</h5>
                    <p class="card-text">
                        <strong>Genres:</strong> 
                        @foreach($film->genres as $genre)
                            {{ $genre->name }}@if (!$loop->last), @endif
                        @endforeach
                        <br>
                        <strong>Summary:</strong> {{ Str::limit($film->summary, 100) }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="{{ route('films.show', $film->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                    @auth
                    <!-- Edit Button -->
                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this film?');">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                    @endauth
                    <small class="text-muted">{{ $film->release_year }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
