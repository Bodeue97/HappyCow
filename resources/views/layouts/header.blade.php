<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<header>
    <div class="header-menu">
        <ul class="header-list">
            <li>
                <a href="/">Strona Startowa</a>
            </li>
            @if(auth()->user() != null)
            @if(auth()->user()->role =='user')
            <li>
                <a href="/application_create">Dodaj ofertę sprzedaży</a>
            </li><li>
                        <a href="/show_applications">Zobacz oferty sprzedaży</a>
                    </li>
            @endif
            @endif
            @if(auth()->user() != null)
                @if(auth()->user()->role =='boss')
                    <li>
                        <a href="/verify_applications">Zatwierdź oferty</a>
                    </li>
                @endif
            @endif

            @if(auth()->user() != null)
                @if(auth()->user()->role == 'transport')
                    <li>
                        <a href="/create_carrier">Dodaj przewoźnika</a>
                    </li>
                    <li>
                        <a href="/show_carriers">Wyświetl przewoźników</a>
                    </li>
                @endif
            @endif

            @if(auth()->guest())
            <li>
                <a href="/login">Zaloguj się</a>
            </li>
            <li>
                <a href="/register">Załóż konto</a>
            </li>

            @else

                <li>
                    <div><h4 style="margin-top: auto; color: #302360">Witaj {{auth()->user()->name}}</h4></div>
                </li>
                <li>
                    <a href="/logout">Wyloguj</a>
                </li>
            @endif
            @if(auth()->user() != null)
                @if( auth()->user()->role == 'admin')
                    <li>
                        <a href="/admin_roles">Zmień typ konta użytkownika</a>
                    </li>


            @endif

@endif
        </ul>

    </div>


</header>
</body>
</html>
