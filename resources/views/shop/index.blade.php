<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .div-brand{
            text-align: center;
            margin-top: 5em;
        }
        .brand-select{
            padding: 2em;
        }
    </style>

</head>
<body>

@extends('layouts.app')

@section('content')

    <div class="div-brand">
@foreach($brands as $brand)
    <a class="brand-select"href="/shop/{{$brand->brand}}">{{$brand->brand}}</a>

    @endforeach
    </div>

@endsection

</body>
</html>
