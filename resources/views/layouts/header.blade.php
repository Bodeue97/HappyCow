<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&display=swap');

        html {
            font-family: 'Alumni Sans Inline One';
            font-size: xx-large;
            background: url(/jpg/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .header-menu {
            background: white;
            text-align: center;
            margin: -1em -1em -1em -1em;
            height: 15%;
        }

        .header-list {
            text-align: center;
            padding-top: 0.7em;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            list-style-type: none

        }


    </style>
</head>
<body>
<header>
    <div class="header-menu">
        <ul class="header-list">
            <li>
                <a href="/" class="{{request()->is('/') ? 'active' : ''}}">Home</a>
            </li>
            <li>
                <a href="/about" class="{{request()->is('about') ? 'active' : ''}}">About</a>
            </li>
            @if(auth()->guest())
            <li>
                <a href="/login" class="{{request()->is('login') ? 'active' : ''}}">Log in</a>
            </li>
            <li>
                <a href="/register" class="{{request()->is('register') ? 'active' : ''}}">Register</a>
            </li>

            @else

                <li>
                    <div><h4 style="margin-top: auto; color: #302360">Welcome {{auth()->user()->name}}</h4></div>
                </li>
                <li>
                    <a href="/logout" class="{{request()->is('logout') ? 'active' : ''}}">Logout</a>
                </li>
            @endif
            @if(auth()->user() != null)
                @if( auth()->user()->role == 'admin')
            <li>
                <a href="/products" class="{{request()->is('products', 'products/*') ? 'active' : ''}}">Products</a>
            </li>

            <li>
                <a href="/admin/sizes" class="{{request()->is('admin/*') ? 'active' : ''}}">Sizes</a>
            </li>
            <li>
                <a href="/shoes" class="{{request()->is('shoes', 'shoes/*') ? 'active' : ''}}">Shoes</a>
            </li>
                @endif
@endif
        </ul>

    </div>


</header>
</body>
</html>
