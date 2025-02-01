@extends('layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Genres</h2>
            
            @auth
                <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Add Genre</a>
            @endauth

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        @auth
                            <th>Actions</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                        <tr>
                            <td>{{ $genre->name }}</td>
                            
                            @auth
                                <td>
                                    <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                                    
                                    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this genre?')">Delete</button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
