@extends('layout.master')

@section('judul', 'Add New Cast')

@section('content')
    <form action="{{ route('cast.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bio">Biography</label>
            <textarea name="bio" id="bio" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
