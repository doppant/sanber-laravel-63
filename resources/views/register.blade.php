@extends('layout.master')

@section('judul')
<h1>Buat Account Baru!</h1>

@endsection

@section('content')
    <div>
        <h4>Sign up Form</h6>
        <form action="{{ route('welcome') }}" method="POST">
            @csrf
            <label for="firstname">First Name:</label><br><br>
            <input type="text" id="firstname" name="firstname" required><br><br>

            <label>Last Name:</label><br><br>
            <input type="text" id="lastname" name="lastname" required><br><br>

            <label>Gender:</label><br><br>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label><br> 
                <input type="radio" id="female" name="gender" value="female" required> 
                <label for="female">Female</label><br> 
                <input type="radio" id="other" name="gender" value="other" required> 
                <label for="other">Other</label><br><br>

            <label for="nationality">Nationality:</label><br><br>
            <select id="nationality" name="nationality">
                <option value="indonesian">Indonesian</option>
                <option value="other">other</option>
            </select><br>

            <label style="display: block; margin: 10px 0 5px;">Language Spoken:</label>
            <input type="checkbox" id="bahasa_indonesia" name="language" value="bahasa_indonesia">
            <label for="bahasa_indonesia">Bahasa Indonesia</label><br>
            <input type="checkbox" id="english" name="language" value="english">
            <label for="english">English</label><br>
            <input type="checkbox" id="other_language" name="language" value="other_language">
            <label for="other_language">Other</label><br><br>

            <label for="bio" >Bio:</label><br><br>
            <textarea id="bio" name="bio" rows="4" cols="50" required></textarea><br>

            <input type="submit" value="Sign Up">
        </form>
    </div>
@endsection()
