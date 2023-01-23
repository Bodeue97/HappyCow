<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Przewoźnicy</title>

</head>
<body>

@extends('layouts.app')

@section('content')

 <h1>Przewoźnicy</h1>
        <table>
            <thead>
            <tr>

                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Adres</th>
                <th scope="col">Pojazd</th>

            </tr>
            </thead>

            <tbody>
            @foreach($carriers as $carrier)

                    <tr>
                        <td>{{$carrier->name}}</td>
                        <td>{{$carrier->last_name}}</td>
                        <td>{{$carrier->address}}</td>
                        <td>{{$carrier->vehicle}}</td>
                        <td>
                        <form method="post" action="/carrier_delete/{{$carrier->id}}">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Usuń</button>
                        </form>
                        </td>
                    </tr>

            @endforeach
            </tbody>


        </table>

@endsection
</body>
</html>
