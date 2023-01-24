<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moje oferty</title>

</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Wystawione oferty</h1>
    <table>
        <thead>
        <tr>

            <th scope="col">Przedmiot oferty</th>
            <th scope="col">Cena</th>
            <th scope="col">Zatwierdzono</th>
            <th scope="col">Zamówiono</th>
            <th scope="col">Opłacono</th>
            <th scope="col">Data odbioru</th>
            <th scope="col">Stan</th>

        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            @foreach($transports as $transport)

                <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->price}}</td>
                    @if($application->verified == true)
                        <td>tak</td>
                    @else
                        <td>nie</td>
                    @endif
                    @if($application->reserved != 0)
                        <td>tak</td>
                    @else
                        <td>nie</td>
                    @endif
                    @if($application->paid_for == true)
                        <td>tak</td>
                    @else
                        <td>nie</td>
                    @endif
                    @if( $transport != null)
                    @if($application->transport_id == $transport->id)
                        <td>{{$transport->pickup_date}}</td>
                    @else
                        <td>nie przypisano transportu</td>
                    @endif
                    @else
                        <td>nie przypisano transportu</td>

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
