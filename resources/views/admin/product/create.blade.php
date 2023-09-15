<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/jquery-3.6.4.js"></script>
    <title>Create Message</title>
</head>
<body>
<form action=" {{ route('admin.home.store-product') }}  " method="post" enctype="multipart/form-data" style="max-width: 600px; margin: 40px auto">
        @csrf
        <div class="form-group">
            <label for="name"> Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="img"> Hinh URL</label>
{{--            <input type="text" name="img" id="img" class="form-control">--}}
            <input type="file" name="img"  class="form-control">
        </div>
        <div class="form-group">
            <label for="detail">Detail:</label>
            <input type="text" name="detail" id="detail" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Decription: </label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="cat_id">cat_id</label>
            <select name="cat_id" class="form-control" id="cat_id">
                @foreach($cat_id as $item)
                    <option value="{{$item->cat_id}}">{{$item->cat_id}}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label for="brand_id">brand_id</label>
        <select name="brand_id" class="form-control" id="brand_id">
            @foreach($brands_id as $item)
                <option value="{{$item->brand_id}}">{{$item->brand_id}}</option>
            @endforeach
        </select>
    </div>
        <br><button class="btn btn-primary save" type="submit">Submit</button>
        <a href="{{route('admin.home.get-product')}}" class="btn btn-secondary" >Close</a>

    </form>


@if(session('success'))
    {{session('success')}}
@endif

@if(count($errors)>0)
    @foreach($errors ->all() as $error)
    {{$error}} <br>
    @endforeach
@endif
</body>
</html>
