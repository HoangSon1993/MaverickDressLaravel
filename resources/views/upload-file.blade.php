<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('handle-file') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="" placeholder="enter your name">
        <input type="file" name="image" id="">
        <button type="submit">Submit</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger">
            Error: {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-primary">
            Success: {{ session('success') }}
        </div>
    @endif

    @if (count($errors))
        @foreach ($errors->all() as $item )
            {{ $item }} <br>
        @endforeach

    @endif

</body>
</html>
