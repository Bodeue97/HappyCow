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
            height: 10%;
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
                <a href="/" class="{{request()->is('about') ? 'active' : ''}}">About</a>
            </li>
            <li>
                <a href="/browse" class="{{request()->is('browse', 'browse/*') ? 'active' : ''}}">Browse</a>
            </li>
            <li>
                <a href="/" class="{{request()->is('login') ? 'active' : ''}}">Log in</a>
            </li>
            <li>
                <a href="/" class="{{request()->is('register') ? 'active' : ''}}">Register</a>
            </li>

        </ul>

    </div>


</header>
</body>
</html>
