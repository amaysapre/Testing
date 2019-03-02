<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        @include('layouts.partials.head')       
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        @include('layouts.partials.header')
        @include('layouts.partials.adsidebar')        
        @yield('content')
        @include('layouts.partials.footer')
    </body>
</html>