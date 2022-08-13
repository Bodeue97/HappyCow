<html xmlns="http://www.w3.org/1999/html">
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
            width: 7em;
            height: 1em;
            border-radius: 0.6em;
            background: rgb(255,186,148);
            background: radial-gradient(circle, rgba(255,186,148,1) 0%, rgba(241,48,2,1) 59%);
            color: #302360;
            font-size: xx-large;
            font-family: 'Alumni Sans Inline One';


        }

        .form-button{
            width: 7em;
            height: 4em;
            background: rgb(241,48,2);
            background: radial-gradient(circle, rgba(241,48,2,1) 3%, rgba(255,186,148,1) 90%);
            border-radius: 1em;
            margin-bottom: 2em;
        }
        .select-shoe{
            text-align: center;
            margin-right: -4em;
            border-radius: 0.6em;
            background: rgb(255,186,148);
            background: radial-gradient(circle, rgba(255,186,148,1) 0%, rgba(241,48,2,1) 59%);
            color: #302360;
        }
        .select-input{
            border-radius: 0.6em;
            background: rgb(255,186,148);
            background: radial-gradient(circle, rgba(255,186,148,1) 0%, rgba(241,48,2,1) 59%);
            color: #302360;
        }
    </style>
</head>
<body>


@extends('layouts.app')

@section('content')
    <div>
        <form action="/products" method="post">
            @csrf
        <label>Choose shoe model</label>
        <select name="shoe">
            @foreach($shoes as $shoe)
            <option value="{{$shoe}}">{{$shoe->model}}</option>
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
