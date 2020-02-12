<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
         @section('content')
            This is the master content.
        @show
        </div>
    </body>
</html>