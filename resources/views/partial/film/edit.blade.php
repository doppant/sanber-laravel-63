@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Film') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('films.update', $film->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $film->title) }}" required autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="summary" class="col-md-4 col-form-label text-md-end">{{ __('Summary') }}</label>
                            <div class="col-md-6">
                                <textarea id="summary" class="form-control @error('summary') is-invalid @enderror" name="summary" rows="4" required>{{ old('summary', $film->summary) }}</textarea>
                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="release_year" class="col-md-4 col-form-label text-md-end">{{ __('Release Year') }}</label>
                            <div class="col-md-6">
                                <input id="release_year" type="text" class="form-control @error('release_year') is-invalid @enderror" name="release_year" value="{{ old('release_year', $film->release_year) }}" required>
                                @error('release_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="genre" class="col-md-4 col-form-label text-md-end">{{ __('Genres') }}</label>
                            <div class="col-md-6">
                                <select id="genre" class="form-control @error('genres') is-invalid @enderror" name="genres[]" multiple required>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" 
                                            @foreach($film->genres as $filmGenre)
                                                @if($filmGenre->id == $genre->id) selected @endif
                                            @endforeach
                                        >
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('genres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poster" class="col-md-4 col-form-label text-md-end">{{ __('Poster') }}</label>
                            <div class="col-md-6">
                                <input id="poster" type="file" class="form-control @error('poster') is-invalid @enderror" name="poster">
                                <small>Current Poster: <img src="{{ asset('storage/' . $film->poster) }}" alt="Poster" width="100"></small>
                                @error('poster')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Film') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
