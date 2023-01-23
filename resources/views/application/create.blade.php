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

    <h1>Wystaw zwierzęta na sprzedarz</h1>

    <form action="/application_store" method="post">
        @csrf
        Numer kolczyka, waga, płeć i wiek
        <input type="text" required name="cattle">
        Cena
        <input type="number" required name="price" min="0" value="0" step="0.1">
        <button class="form-button" type="submit"><h4>Dodaj ofertę</h4></button>
    </form>


@endsection

</body>
</html>
