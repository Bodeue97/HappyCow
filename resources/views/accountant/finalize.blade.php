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
            <th scope="col>">Imię i nazwisko sprzedającego</th>
            <th scope="col">Imię i nazwisko kupującego</th>



        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            @foreach($buyers as $buyer)
                @foreach($sellers as $seller)

                    @if(($application->seller_id == $seller->id )& ($application->reserved_by == $buyer->id))
                <tr>

                    <td>{{$application->cattle}}</td>
                    <td>{{$application->price}}</td>
                    <td>{{$application->account_number}}</td>
                    <td>{{$seller->name}} {{$seller->last_name}}</td>
                    <td>{{$buyer->name}} {{$buyer->last_name}}</td>
                    <td>
                        <form method="post" action="/finalize_order/{{$application->id}}">
                            @csrf
                            @method('PUT')
                            <button type="submit">Zatwierdź</button>
                        </form>
                    </td>


                </tr>
                    @endif
            @endforeach
            @endforeach
        @endforeach
        </tbody>


    </table>

@endsection
</body>
</html>
