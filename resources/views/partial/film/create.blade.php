@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Film</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('films.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <!-- Summary -->
                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea name="summary" id="summary" class="form-control" rows="4" required></textarea>
                        </div>

                        <!-- Release Year -->
                        <div class="mb-3">
                            <label for="release_year" class="form-label">Release Year</label>
                            <input type="text" name="release_year" id="release_year" class="form-control" required>
                        </div>

                        <!-- Poster -->
                        <div class="mb-3">
                            <label for="poster" class="form-label">Poster</label>
                            <input type="file" name="poster" id="poster" class="form-control" accept="image/*" required>
                        </div>

                        <!-- Genres (Multiple selection) -->
                        <div class="mb-3">
                            <label for="genres" class="form-label">Genres</label>
                            <select name="genres[]" id="genres" class="form-control" multiple required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Create Film</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
