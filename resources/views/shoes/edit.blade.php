<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>



        h5{
            border-radius: 2em;
            margin-left: 25%;
            width: 50%;
            background-color: rgba(255,25,0,0.4);
        }

        div{

            text-align: center;
            background-color: rgba(255,255,255,0.6);
            margin: -1em -1em -1em -1em;
            box-shadow: #302360 5px 5px;

        }


        h4{

            margin: 0 0 0 0;
            font-family: 'Alumni Sans Inline One';
            font-size: xxx-large;
        }

        .niminput{
            text-align: center;
            width: 10em;
            height: 2em;
            border-radius: 0.6em;
            background: rgb(255,186,148);
            background: radial-gradient(circle, rgba(255,186,148,1) 0%, rgba(241,48,2,1) 59%);
            color: #302360;
            font-size: xx-large;
            font-family: 'Alumni Sans Inline One';


        }

        .form-button{
            width: auto;
            height: 4em;
            background: rgb(241,48,2);
            background: radial-gradient(circle, rgba(241,48,2,1) 3%, rgba(255,186,148,1) 90%);
            border-radius: 1em;
            margin-bottom: 2em;




        }
    </style>
</head>
<body>


@extends('layouts.app')

@section('content')


    @if($errors->any())
        <h1>ERROR: {{ implode('', $errors->all(':message')) }}</h1>


    @else
    <div>
        <form action="/shoes/{{$shoe->id}}" method="post">
            @csrf
            @method('PUT')
            <h5>Brand</h5>
            <input class="niminput" type="text" name="brand" value="{{$shoe->brand}}" required>
            <h5>Model</h5>
            <input class="niminput" type="text" name="model" value="{{$shoe->model}}"required>
            <h5>Color</h5>
            <input class="niminput" type="text" name="color" value="{{$shoe->color}}"required>
            <h5>Price</h5>
            <input class="niminput" type="number" min="0" max="100000"step="0.01" name="price"value="{{$shoe->price}}">
            <p></p>
            <button class="form-button" type="submit" ><h4>UPDATE</h4></button>
        </form>

    </div>

    @endif
@endsection
</body>
</html>
