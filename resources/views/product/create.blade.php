<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>




        .create-div{

            text-align: center;
            background-color: rgba(255,255,255,0.6);
            margin: 1em -1em -1em -1em;
            box-shadow: #302360 5px 5px;

        }





    </style>
</head>
<body>


@extends('layouts.app')

@section('content')


    <div class="create-div">
        <form action="/products" method="post">
            @csrf
        <label>Choose shoe model</label>
        <select name="shoe">
            @foreach($shoes as $shoe)
            <option value="{{$shoe}}">{{$shoe->model.' '. $shoe->color}}</option>
            @endforeach
        </select>

        <label>Choose size</label>
        <select name="size">
            @foreach($sizes as $size)
                <option value="{{$size}}">{{$size->EU}}</option>
            @endforeach
        </select>

        <button type="submit">Add</button>
        </form>

    </div>


@endsection
</body>
</html>
