<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            font-size: xx-large;
            margin: auto;
            text-align: center;
            border: 1px solid;
            background: rgb(255, 186, 148);
            background: radial-gradient(circle, rgba(255, 186, 148, 1) 3%, rgba(241, 48, 2, 1) 57%);
        }

        td {
            font-size: xx-large;
        }

        .delete {
            padding-top: 1em;
        }

        button {
            font-family: 'Alumni Sans Inline One';
            font-size: x-large;
            border-width: 4px;
            border-color: #e2160b;
            border-radius: 0.5em;
            background: rgb(241, 100, 2);

        }

        .size-cells {
            width: 4em;
        }

        .add-button {
            text-align: center;
            margin-top: 1em;

        }

        .add {
            width: 8em;
        }

        .input-search {
            background-color: #E2160BFF;
            font-family: 'Alumni Sans Inline One';
            width: 15em;
            height: auto;
            font-size: x-large;
        }


        .delete {
            height: auto;
            width: 4em;
        }


    </style>
</head>
<body>

@extends('layouts.app')

@section('content')
    <div class="add-button">
        <a href="/products/create">
            <button class="add">Add new</button>
        </a>
    </div>

    <div class="form-container">
        <form action="/products/search" method="post">
            @csrf
            @method('POST')
            <h5>Find shoes by keyword</h5>
            <input class="input-search"type="text" name="keyword"/>
            <button type="submit">Search</button>
        </form>
    </div>


    <table>
        <thead>
        <tr>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">Size
                <table>
                    <thead>
                    <tr>
                        <th class="size-cells"scope="col">EU</th>
                        <th class="size-cells"scope="col">UK</th>
                        <th class="size-cells"scope="col">US (M)</th>
                        <th class="size-cells"scope="col">US (F)</th>
                        <th class="size-cells" scope="col"></th>
                    </tr>
                    </thead>
                </table>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($shoes as $shoe)

            <tr>
                <td>{{$shoe->brand}}</td>
                <td>{{$shoe->model}}</td>
                <td>{{$shoe->color}}</td>
                <td>{{$shoe->price}}</td>
                <td>
                    <table>
                        <tbody>
                        @if($shoe->size_ids!=null)
                            @if(gettype($shoe->size_ids) == 'integer')
                                @foreach($sizes as $size)
                                    @if($shoe->size_ids == $size->id)
                                        <th class="size-cells">{{$size->EU}}</th>
                                        <th class="size-cells">{{$size->UK}}</th>
                                        <th class="size-cells">{{$size->US_male}}</th>
                                        <th class="size-cells">{{$size->US_female}}</th>
                                        <th class="form-cell">
                                            <form class="delete" method="post"
                                                  action="/products/{{$shoe->id}}/{{$size->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </th>
                                    @endif
                                @endforeach


                            @else
                                @foreach($shoe->size_ids as $ids)
                                    <tr>

                                        @foreach($sizes as $size)
                                            @if($ids == $size->id)
                                                <th class="size-cells">{{$size->EU}}</th>
                                                <th class="size-cells">{{$size->UK}}</th>
                                                <th class="size-cells">{{$size->US_male}}</th>
                                                <th class="size-cells">{{$size->US_female}}</th>
                                                <th class="form-cell">
                                                    <form class="delete" method="post"
                                                          action="/products/{{$shoe->id}}/{{$size->id}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </th>
                                            @endif
                                        @endforeach

                                    </tr>
                                @endforeach

                            @endif
                        @endif


                        </tbody>
                    </table>
                </td>
            </tr>

        @endforeach


        </tbody>
    </table>

@endsection
</body>
</html>
