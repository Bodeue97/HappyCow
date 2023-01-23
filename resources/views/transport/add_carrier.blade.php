<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dodaj przewoźnika</title>
</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Dodaj przewoźnika</h1>

    <form method="post" action="/create_carrier">
        @csrf
        Imię
        <input name="name" type="text">
        Nazwisko
        <input name="last_name" type="text">
        Adres
        <input name="address" type="text">
        Pojazd
        <input name="vehicle" type="text">
        <button type="submit">Dodaj</button>
    </form>


@endsection

</body>
</html>
