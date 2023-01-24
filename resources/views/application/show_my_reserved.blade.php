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

    <h1>Oferty sprzedaży</h1>
    <table>
        <thead>
        @foreach($applications as $application)
            @foreach($transports as $transport)
        <tr>


            <th scope="col">Przedmiot oferty</th>
            <th scope="col">Cena</th>
            <th scope="col">Numer konta</th>
            <th scope="col">Status</th>

        </tr>
        </thead>

        <tbody>


                <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->price}}</td>
                    @if($application->paid_for == true)
                    <td>opłacono</td>
                    @else
                        <td>nie opłacono</td>
                    @endif
                    @if($transport != null)
                    @if($application->transport_id != null & $application->transport_id == $transport->id)
                        <td>Zamówienie zostanie wysłane {{$transport->pickup_date}}</td>
                    @else
                        <td>Nie przydzielono transportu</td>
                    @endif
                    @else
                        <td>Nie przydzielono transportu</td>
                    @endif




                </tr>
                @endforeach
        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
