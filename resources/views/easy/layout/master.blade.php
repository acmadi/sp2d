<!DOCTYPE html>
<html>
    <head>
        <title>SP2D - {{ config('database.connections.mysql.database')}} @yield('title')</title>
        @section('header')
            This is the master sidebar.
        @show
    </head>
    <body class="easyui-layout">
        @section('sidebar')
            
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            
            <p>This is my body content.</p>
        @show
    </body>
</html>