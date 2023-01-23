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

    <div class="form-div">
        <table>
            <thead>
            <tr>

                <th scope="col">Email</th>
                <th scope="col">Rola</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                @if($user->role != 'admin')
                <tr>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><a href="/admin_roles_edit/{{$user->id}}">
                            <button type="button">Edit</button>
                        </a></td>

                </tr>
                @endif
            @endforeach
            </tbody>


        </table>

@endsection
</body>
</html>
