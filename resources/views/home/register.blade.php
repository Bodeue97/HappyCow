<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejestracja</title>


</head>
<body>


@extends('layouts.app')

@section('content')


    @if($errors->any())
        <h1>ERROR: {{ implode('', $errors->all(':message')) }}</h1>


    @else
        <div>    <form action="/register" method="post">
                @csrf
                <h5>Imię</h5>
                <input type="text" name="name">
                <h5>Nazwisko</h5>
                <input type="text" name="last_name">
                <h5>Email</h5>
                <input  type="text" name="email">
                <h5>Adres</h5>
                <input  type="text" name="address">
                <h5>Hasło</h5>
                <input type="password" name="password">
                <h5>Potwierdź hasło</h5>
                <input type="password" name="password_confirmation">

                <p></p>


                <p></p>
                <button class="form-button" type="submit"><h4>Zarejestruj</h4></button>
            </form>

        </div>
    @endif

@endsection




</body>
</html>
