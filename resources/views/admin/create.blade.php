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

    <form action="/admin/sizes" method="post">
        @csrf
        <h5>EU</h5>
        <input type="number" step="0.1" name="EU">
        <h5>UK</h5>
        <input type="number" step="0.1" name="UK">
        <h5>US (M)</h5>
        <input type="number" step="0.1" name="US_male">
        <h5>US (F)</h5>
        <input type="number" step="0.1" name="US_female">
        <button type="submit">Add</button>
    </form>


@endsection
</body>
</html>
