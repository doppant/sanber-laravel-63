@extends('layout.master')

@section('judul', 'Edit Cast')

@section('content')
    <form action="{{ route('cast.update', $cast->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $cast->name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $cast->age }}" required>
        </div>
        <div class="form-group">
            <label for="bio">Biography</label>
            <textarea name="bio" id="bio" class="form-control">{{ $cast->bio }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
@endsection
