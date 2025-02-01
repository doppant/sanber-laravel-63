@extends('layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Genres</h2>
            <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Add Genre</a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                        <tr>
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection