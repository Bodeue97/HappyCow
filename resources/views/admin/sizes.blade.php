<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .container{
            background: rgba(255,255,255,0.5);
        text-align: center;
        }
        table, th, td {
            margin: 10em auto 0 auto;
            text-align: center;
            border: 1px solid;
        }
        td{
            font-size: large;
        }
        .delete{
            padding-top: 1em;
        }
    </style>
</head>
<body>


@extends('layouts.app')

@section('content')

    <a href="/admin/sizes/create"><button>Add Size</button></a>
    <div class="container">
    <table>
        <thead>
        <tr>
            <th scope="col">EU</th>
            <th scope="col">UK</th>
            <th scope="col">US (M)</th>
            <th scope="col">US (F)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sizes as $size)
            <tr>
                <td>
                    {{$size->EU}}
                </td>
                <td>
                    {{$size->UK}}
                </td>
                <td>
                    {{$size->US_male}}
                </td>
                <td>
                    {{$size->US_female}}
                </td>
                <td>
                    <a href="admin/sizes/{{$size->id}}/edit"> <button type="button">Edit</button></a>
                </td>
                <td>
                    <form class="delete" method="post" action="/admin/sizes/{{$size->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="{{$size->id}}">Delete</button> </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection

</body>
</html>
