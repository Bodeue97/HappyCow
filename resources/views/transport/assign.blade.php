<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Przypisz transport</title>

</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Przypisz transport do tych zgłoszeń</h1>
    <table>
        <thead>
        <tr>

            <th scope="col">Przedmiot oferty</th>
            <th scope="col">Identyfikator zgłoszenia</th>



        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->id}}</td>
                    <td>
                        <form method="post" action="/transport_assign/{{$application->id}}">
                            @csrf
                            @method('PUT')
                            <button type="submit">Przypisz transport</button>
                        </form>
                    </td>


                </tr>

        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
