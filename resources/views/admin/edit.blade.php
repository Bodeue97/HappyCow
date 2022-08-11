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
            width: 3em;
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
    <div>
        <form action="/admin/sizes/{{$size->id}}" method="post">
            @csrf
            @method('PUT')
            <h5>EU</h5>
            <input class="niminput" type="number" step="0.1" name="EU" value="{{$size->EU}}" required>
            <h5>UK</h5>
            <input class="niminput" type="number" step="0.1" name="UK" value="{{$size->UK}}"required>
            <h5>US (M)</h5>
            <input class="niminput" type="number" step="0.1" name="US_male" value="{{$size->US_male}}"required>
            <h5>US (F)</h5>
            <input class="niminput" type="number" step="0.1" name="US_female"value="{{$size->US_female}}">
            <p></p>
            <button class="form-button" type="submit" ><h4>UPDATE</h4></button>
        </form>

    </div>


@endsection
</body>
</html>
