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

    <form action="/admin_roles_save" method="post">
        @csrf
        @method('PUT')
        Email
        <h4>{{$user->email}}</h4>
        <select name="role">
            <option value="user">Domyślny użytkownik</option>
            <option value="boss">Dyrektor</option>
            <option value="accountant">Księgowość</option>
            <option value="transport">Kierownik transportu</option>
        </select>
        <input name="user_id" type="hidden" value="{{$user->id}}">
        <input type="submit">




    </form>


@endsection
</body>
</html>
