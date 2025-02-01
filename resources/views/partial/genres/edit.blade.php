@extends('layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Genre</h2>
            
            <form action="{{ route('genres.update', $genre->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $genre->name) }}" required>

                    @if($errors->has('name'))
                        <div class="alert alert-danger mt-2">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
