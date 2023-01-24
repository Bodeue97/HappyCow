<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularz przydzielania transportu</title>

</head>
<body>

@extends('layouts.app')

@section('content')

    <h1>Przydziel transport</h1>

    <form action="/transport_assign" method="post">
        @csrf
        Data odbioru
        <input type="date" name="pickup_date" required min={{$date_now}}>
        Adres odbioru
        <input type="text" name="transport_from" required value={{$seller->address}}>
        Adres dostawy
        <input type="text" name="transport_to" required value={{$buyer->address}}>
        Przewoźnik
        <select name="carrier_id">
            @foreach($carriers as $carrier)
            <option value={{$carrier->id}}>{{$carrier->last_name}} {{$carrier->vehicle}}</option>
            @endforeach

        </select>
        <input type="hidden" name="application_id" value={{$application_id}}>
        <button type="submit">Przydziel</button>

    </form>


@endsection
</body>
</html>
