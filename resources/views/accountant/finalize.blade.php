<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Płatności do zatwierdzenia</title>

</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Płatności:</h1>
    <table>
        <thead>
        <tr>


            <th scope="col">Kwota</th>
            <th scope="col">Numer zamówienia</th>
            <th scope="col">Numer konta sprzedającego</th>
            <th scope="col>">Identyfikator zamawiającego</th>



        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)

                <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->price}}</td>
                    <td>{{$application->account_number}}</td>
                    <td>{{$application->reserved_by}}</td>
                    <td>
                        <form method="post" action="/finalize_order/{{$application->id}}">
                            @csrf
                            @method('PUT')
                            <button type="submit">Zatwierdź</button>
                        </form>
                    </td>


                </tr>

        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
