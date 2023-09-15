<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Message</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/jquery-3.6.4.js"></script>
</head>
<body>
{{--<form action=" {{ route('web.home.update-product', ['id' => $product->id]) }}  " method="post">--}}
{{--    @csrf--}}
{{--    @method('put')--}}
{{--    <input type="text" name="name" placeholder="name" value="{{ $product-> name}}">--}}
{{--    <input type="text" name="description" placeholder="description" value="{{ $product-> description}}">--}}
{{--    <input type="text" name="content" placeholder="content" value="{{ $product-> content}}">--}}
{{--    <button type="submit">Submit</button>--}}
{{--</form>--}}




    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SỬA SẢN PHẨM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action=" {{ route('web.home.update-product', ['id' => $product->id]) }} " method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id:</label>
                        <input type="number" name="id" id="edit-id" class="form-control" value="{{$product->id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name"> Name:</label>
                        <input type="text" name="name" id="edit-name" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="edit-price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="img"> Hinh URL</label>
                        <input type="text" name="img" id="edit-img" class="form-control" value="{{$product->img}}">
                        <input type="file" name="" id="" class="form-control" Onchange="xuLyFile()">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail:</label>
                        <input type="text" name="detail" id="edit-detail" class="form-control" value="{{$product->detail}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Decription: </label>
                        <input type="text" name="description" id="edit-description" class="form-control" value="{{$product->description}}">
                    </div>
                    <div class="form-group">
                        <label for="cat_id">cat_id</label>
                        <select name="cat_id" class="form-control" id="cat_id">
                            @foreach($cat_id as $item)
                                <option value="{{$item->cat_id}}" {{ $item->cat_id == $product->cat_id ? 'selected' : '' }}>
                                    {{$item->cat_id}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brand_id">brand_id</label>
                        <select name="brand_id" class="form-control" id="brand_id">
                            @foreach($brands_id as $item)
                                <option value="{{$item->brand_id}}" {{ $item->brand_id == $product->brand_id ? 'selected' : '' }}>
                                    {{$item->brand_id}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <div class="modal-footer">
                        <a href="{{route('web.home.get-product')}}" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary sua" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@if(session('success'))
    {{session('success')}}
@endif
</body>
</html>
