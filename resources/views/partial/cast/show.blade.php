@extends('layout.master')

@section('judul', 'Cast Details')

@section('content')
    <h3>{{ $cast->name }}</h3>
    <p><strong>Age:</strong> {{ $cast->age }}</p>
    <p><strong>Biography:</strong> {{ $cast->bio }}</p>
    <a href="{{ route('cast.index') }}" class="btn btn-primary">Back to List</a>
@endsection
