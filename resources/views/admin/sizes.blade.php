<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .container{
            margin-top: -8em;
        text-align: center;

        }
        table, th, td {
            font-size: xx-large;
            margin: 10em auto 0 auto;
            text-align: center;
            border: 1px solid;
            background: rgb(255,186,148);
            background: radial-gradient(circle, rgba(255,186,148,1) 3%, rgba(241,48,2,1) 57%);
        }
        td{
            font-size: xx-large;
        }
        .delete{
            padding-top: 1em;
        }

        button{
            font-family: 'Alumni Sans Inline One';
            font-size: x-large;
            border-width: 4px;
            border-color: #e2160b;
            border-radius: 0.5em;
            background: rgb(241,100,2);

        }




    </style>
</head>
<body>


@extends('layouts.app')

@section('content')


    <div class="container">
    <table>
        <thead>

        <tr>

            <th scope="col">EU</th>
            <th scope="col">UK</th>
            <th scope="col">US (M)</th>
            <th scope="col">US (F)</th>
            <th scope="col"><a class="add-button" href="/admin/sizes/create"><button>Add Size</button></a></th>
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
                    <a href="/admin/sizes/{{$size->id}}/edit"> <button type="button">Edit</button></a>
                </td>
                <td>
                    <form class="delete" method="post" action="/admin/sizes/{{$size->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button> </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection

</body>
</html>
