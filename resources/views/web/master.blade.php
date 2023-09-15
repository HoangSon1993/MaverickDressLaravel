<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   @include('web.layout.style')
</head>
<body>
    @include('web.layout.menu')

    @yield('content')

    @include('web.layout.footer')
    @include('web.layout.script')
</body>
</html>
