<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Style -->
        @include('block.style')
    </head>
    <body>
        @include('block.header')

        <div class="container-fluid" style="min-height: 450px;">
            @yield('content')
        </div>

        @include('block.footer')

        @include('block.modalNewEntry')

        <!-- JavaScripts -->
        @include('block.script')
        @yield('script')
    </body>
</html>
