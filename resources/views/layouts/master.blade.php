<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DGB:Gallery - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.0.0/normalize.css">
    <style>
        body, html {
            background-color: #888;
        }
        header {
            min-height: 100px;
            background-color: #999;
            color: white;
        }

        main {

        }

        footer {
            min-height: 100px;
            background-color: #999;
            color: white;
        }

        .album {
            border: solid 1px black;
            margin: 2px;
        }
    </style>
</head>

<body>



    <header>
        <h1>Header stuff here</h1>
        <nav>
            <a href="{{ url('album') }}">All Albums</a> |
            @if(Auth::check())
                <a href="{{ url('album/create') }}">New Album</a> |
                <a href="{{ url('config') }}">Config</a>
                <span>user: {{ Auth::user()->email }}</span>
                <a href="{{ url('logout') }}">Logout</a>
            @else
                <a href="{{ url('login') }}">Login</a>
            @endif

            </nav>
    </header>

    <main>
    @yield('main_content')    
    </main>

    <footer>
        footer stuff here
    </footer>


</body>
</html>