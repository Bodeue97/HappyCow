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

    <h1>Moje zamówienia</h1>
    <table>
        <thead>
        @foreach($applications as $application)
            @foreach($transports as $transport)
        <tr>


            <th scope="col">Przedmiot oferty</th>
            <th scope="col">Cena</th>
            <th scope="col">Numer konta</th>
            <th scope="col">Opłacono</th>
            <th scope="col">Data wysyłki</th>
            <th scope="col">Stan</th>


        </tr>
        </thead>

        <tbody>


                <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->price}}</td>
                    <td>{{$application->account_number}}</td>
                    @if($application->paid_for == true)
                    <td>tak</td>
                    @else
                        <td>nie</td>
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
                    @if( $transport != null)
                        @if($application->transport_id == $transport->id)
                            <td>{{$transport->delivered}}</td>
                        @else
                            <td>nie dostarczono</td>
                        @endif
                    @else
                        <td>nie dostarczono</td>

                    @endif



                </tr>
                @endforeach
        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
