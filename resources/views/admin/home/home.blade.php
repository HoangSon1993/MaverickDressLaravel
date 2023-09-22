@extends('admin.master')

@section('title')
    Home-Admin
@endsection

@section('content')
    <body>
    <!-- Button trigger modal -->
    <a  class="btn btn-info btn-lg" href="{{route('admin.home.create-product')}}"
        {{--    type="button" data-toggle="modal" data-target="#modelIdThemMoi" --}}
        style="position: fixed; right: 40px; bottom: 40px;"
    >Thêm mới
    </a>
    <!------------- MODAL ----------->
    <!-- Modal them moi san pham -->
    <div class="modal fade" id="modelIdThemMoi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÊM SẢN PHẨM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" name="frm">
                        <div class="form-group">
                            <label for="id">Id:</label>
                            <input type="number" name="id" id="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_id">cat_id</label>
                            <input type="text" name="cat_id" id="cat_id" class="form-control">
                        </div>
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
                            <input type="text" name="img" id="img" class="form-control">
                            <input type="file" name="" id="" class="form-control" Onchange="xuLyFile()">
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail:</label>
                            <input type="text" name="detail" id="detail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Decription: </label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Sua san pham -->
    <div class="modal fade" id="modelIdSua" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SỬA SẢN PHẨM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" name="frm">
                        <div class="form-group">
                            <label for="id">Id:</label>
                            <input type="number" name="id" id="edit-id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_id">cat_id</label>
                            <input type="text" name="cat_id" id="edit-cat_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name"> Name:</label>
                            <input type="text" name="name" id="edit-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="edit-price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="img"> Hinh URL</label>
                            <input type="text" name="img" id="edit-img" class="form-control">
                            <input type="file" name="" id="" class="form-control" Onchange="xuLyFile()">
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail:</label>
                            <input type="text" name="detail" id="edit-detail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Decription: </label>
                            <input type="text" name="description" id="edit-description" class="form-control">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sua">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Xoa san pham -->
    <div class="modal fade" id="modelIdXoa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xoá sản phẩm này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ok">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- navigation -->
    <nav class="navbar navbar-expand-sm nav-light bg-light">
        <a href="" class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-togge d-lg-none" type="button" data-togger="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-togger-icon"></span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar mr-auto mt-2 mt-lg-0" style="list-style: none;">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.home.get-product')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item logout" href="#">Logout</a>
                        <a class="dropdown-item" href="#">Profile</a>
                    </div>
                </li>
            </ul>
        </div>

    </nav>
    {{--chen code php de in ra san pham--}}
    <div class="container">
        <div class="row">
            <table class="table" id="table">
                @foreach( $products as $item)
                    <tr id='{{ $item->id }}'>
                        <td class="align-middle">{{$item->id}}</td>
                        <td class="align-middle">{{$item->name}}</td>
                        <td class="align-middle" style="max-width:80px">
                            <img class='img-fluid max-width: 100%' src="{{ url($item->img) }}" alt="img">
                        </td>
                        <td class="align-middle">
                            {{--                        <a href="delete-product/{{ $item->id }}" class="xoa btn btn-danger btn-lg">Xoá</a>--}}
                            <a href="javascript:void(0);" data-id="{{ $item->id }}" class="xoa btn btn-danger btn-lg">Xoá</a>
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.home.edit-product', ['id' => $item->id]) }}" class="sua btn btn-primary btn-lg">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- Hiển thị nút phân trang -->
            {!! $products->links() !!}
        </div>
    </div>
    </body>
    </html>
@endsection
