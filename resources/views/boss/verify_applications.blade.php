<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oferty do zatwierdzenia</title>

</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Oferty do zatwierdzenia</h1>
    <table>
        <thead>
        <tr>


            <th scope="col">Przedmiot oferty</th>
            <th scope="col">Cena</th>

        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            @if($application->verified == false)
            <tr>

                <td>{{$application->cattle}}</td>
                <td>{{$application->price}}</td>
                <td>
                    <form method="post" action="/verify_applications/{{$application->id}}">
                        @csrf
                        @method('PUT')

                        <button type="submit">Zatwierdź</button>
                    </form>
                </td>
                    <td>
                    <form method="post" action="/verify_applications/{{$application->id}}">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Odrzuć</button>
                    </form>
                </td>

            </tr>
            @endif
        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
