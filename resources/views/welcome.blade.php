@extends('layout.master')

@section('judul')
<h1>SanberBook</h1>
@endsection()

@section('content')
    <main>
        <section>
            <h2>SELAMAT DATANG {{ $firstname }} {{ $lastname }}!</h2>
            <p>Terima kasih telah bergabung di SanberBook. Social Media kita bersama!</p>
        </section>
    </main>
@endsection()