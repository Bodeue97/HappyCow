<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>


@extends('layouts.app')

@section('content')


    @if($errors->any())
        <h1>ERROR: {{ implode('', $errors->all(':message')) }}</h1>


    @else
        <div>    <form action="/login" method="post">
                @csrf

                <h5>Email</h5>
                <input type="text" name="email">
                <h5>Hasło</h5>
                <input  type="password" name="password">


                <p></p>


                <p></p>
                <button class="form-button" type="submit"><h4>Zaloguj</h4></button>
            </form>

        </div>
    @endif

@endsection




</body>
</html>
