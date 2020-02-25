<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
     
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset("css/main.css")}}" />

    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/">Laravel Posts</a></li>
            </ul>
            <ul>
                <li><a href="/posts">Posts</a></li>
                <li><a href="/posts/create">Create Post</a></li>
            </ul>
        </nav>

        <main class="container">
            @yield("content")
        </main>
        <script src="{{ asset("js/functions.js")}}"></script>
    </body>
</html>
