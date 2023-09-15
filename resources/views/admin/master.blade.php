<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   @include('admin.layout.style')
</head>
<body>
    @include('admin.layout.menu')

    @yield('content')

    @include('admin.layout.footer')
    @include('admin.layout.script')
</body>
</html>
