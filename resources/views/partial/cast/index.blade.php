@extends('layout.master')

@section('judul', 'Cast List')

@section('content')
    <a href="{{ route('cast.create') }}" class="btn btn-primary mb-3">Add New Cast</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($casts as $cast)
                <tr>
                    <td>{{ $cast->name }}</td>
                    <td>{{ $cast->age }}</td>
                    <td>
                        <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('cast.edit', $cast->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cast.destroy', $cast->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
