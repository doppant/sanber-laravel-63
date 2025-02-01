@extends('layout.master')

@section('judul')
<header>
    <h1>SanberBook</h1>
</header>
@endsection
    
@section('content')
    <main>
        <section>
            <h2>Social Media Developer Santai Berkualitas</h2>
            <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas.</p>
        </section>

        <section>
            <h2>Benefit Join di SanberBook</h2>
            <ul>
                <li>Mendapatkan motivasi dari sesama developer</li>
                <li>Sharing knowledge dari para mastah Sanber</li>
                <li>Dibuat oleh calon web developer terbaik</li>
            </ul>
        </section>

        <section>
            <h2>Cara Bergabung ke SanberBook</h2>
            <ol>
                <li>Mengunjungi Website ini</li>
                <li>Mendaftar di <a href="{{ route('register') }}">Form Sign Up</a></li>
                <li>Selesai!</li>
            </ol>
        </section>
    </main>
@endsection()
