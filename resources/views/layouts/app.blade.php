<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--bootstrap-->
        <!--CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Styles -->
        <link href="{{ secure_asset('css/application.css') }}" rel="stylesheet">
        <!-- flatpickr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.4.3/flatpickr.css">
        <!-- font -->
        <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
        <!-- font awesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    </head>
    
    <body>
        @yield('navbar')
        
        <div class="container">
            @yield('content')
        </div>
        
        @yield('footer')
    </body>
</html>
