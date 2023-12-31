@extends('web.master')

@section('content')
    <!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/jquery-3.6.4.js"></script>
</head>

<body>
<!-- Button trigger modal -->
<a  class="btn btn-primary btn-lg" href="{{route('web.home.create-product')}}"
{{--    type="button" data-toggle="modal" data-target="#modelIdThemMoi" --}}
    style="position: fixed; left: 10px; bottom: 20px;"
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                        <a href="{{ route('web.home.edit-product', ['id' => $item->id]) }}" class="sua btn btn-primary btn-lg">Sửa</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
<script>
    $(function() {
        //Kiem tra dang nhap
        // if (!localStorage.getItem('admin')) window.location = 'login.html'
        // // dang xuat
        // $('.logout').click(function() {
        //     localStorage.removeItem('admin');
        //     window.location = 'login.html'
        // })


        // myUrl = "https://645b91baa8f9e4d6e76c3740.mockapi.io/producDoAn/"
        // $.ajax({
        //     type: 'GET',
        //     url: myUrl,
        //     success: function(data) {
        //         s = ''
        //         $.each(data, function(k, v) {
        //             s += `<tr id='sp_${v.id}'>
        //                         <td>${v.id}</td>
        //                         <td>${v.name}</td>
        //                         <td>
        //                             <button type="button" class="xoa btn btn-danger btn-lg" data-toggle="modal" data-target="#modelIdXoa" data-id='${v.id}' onclick="f1(${v.id})">Xoá</button>
        //                         </td>
        //                         <td><button type="button" class="sua btn btn-primary btn-lg" data-toggle="modal" data-target="#modelIdSua" data-id='${v.id}'>Sửa</button>
        //                         </td>
        //                     </tr>`
        //         })
        //         $('#table').html(s)



                //thiet lap su kien cho nut xoa a.xoa
                $('#table a.xoa').click(function() {
                    id = $(this).data('id')
                    alert('xoa phan tu ' + id)
                    $.ajax({
                        url: myUrl + "/" + id,
                        type: 'DELETE',
                        success: function(data) {
                            console.log(data)
                            $('#sp_' + id).hide(1000)
                            console.log($(this));
                        }
                    })
                })
                // Thiet lap su kien cho nut sua a.sua
                $('#table button.sua').click(function() {
                    id = $(this).data('id')
                    $.each(data, function(k, v) {
                        if (v.id == id) {
                            document.getElementById('edit-name').value = v.name;
                            document.getElementById('edit-price').value = v.price;
                            document.getElementById('edit-img').value = v.img;
                            document.getElementById('edit-detail').value = v.detail;
                            document.getElementById('edit-id').value = v.id;
                            document.getElementById('edit-cat_id').value = v.cat_id;
                            document.getElementById('edit-description').value = v.description;
                        }
                    })
                })
            }
        )
    //modal-tạo-moi--Nut-save__Luu-san-pham
    $(function() {
        $('button.save').click(function() {
            //them moi
            obj = {
                "name": $('form #name').val(),
                "price": $('form #price').val(),
                "img": $('form #img').val(),
                "detail": $('form #detail').val(),
                "id": $('form #id').val(),
                "cat_id": $('form #cat_id').val(),
                "description": $('form #description').val()
            }
            console.log($('form #img').val())
            myUrl = "https://645b91baa8f9e4d6e76c3740.mockapi.io/producDoAn"

            $.post(myUrl, obj, function(data, status) {
                alert("Data: " + data + "\nStatus: " + status)
                console.log(data);
            })
        })
    })
    //modal-tạo-moi--Nut-save__Luu-san-pham
    $(function() {
        $('button.sua').click(function() {
            //sua san pham
            obj = {
                "name": $('form #edit-name').val(),
                "price": $('form #edit-price').val(),
                "img": $('form #edit-img').val(),
                "detail": $('form #edit-detail').val(),
                "id": $('form #edit-id').val(),
                "cat_id": $('form #edit-cat_id').val(),
                "description": $('form #edit-description').val()
            }
            myUrl = "https://645b91baa8f9e4d6e76c3740.mockapi.io/producDoAn/";
            $.ajax({
                type: "PUT",
                url: myUrl + "/" + $('form #edit-id').val(),
                success: function(data) {
                    // $(obj).put(data);
                    alert('Cap nhat san pham thanh cong!')
                    location.reload()
                },
                error: function(error) {
                    alert('Error: ' + error);
                },
                dataType: "json",
                data: obj
            });
        })
    })
    // nut ok. xoa san pham
    $(function() {
        $('button.ok').click(function() {
            // alert('ok')
            id = localStorage.getItem("id")
            myUrl = "https://645b91baa8f9e4d6e76c3740.mockapi.io/producDoAn/";
            $.ajax({
                url: myUrl + "/" + id,
                type: 'DELETE',
                success: function(data) {
                    console.log(data)
                    // $('#sp_' + id).hide(1000)
                    console.log($(this));
                }
            })
            document.submit();
        })
    })

    function f1(id) {
        localStorage.setItem("id", id)
    }

    function xuLyFile() {
        var arr = event.target.files; //mảng các file được chọn(name, LastModified,...)
        var f = arr[0]
        var cat_id = document.getElementById('cat_id').value;
        console.log(f.name);
        //truong hop tao moi
        var cat_id = document.getElementById('cat_id').value;
        console.log(f.name);
        document.getElementById('img').value = `./image/${cat_id}/${f.name}`
        // truong hop edit
        var cat_id2 = document.getElementById('edit-cat_id').value;
        console.log(f.name);
        document.getElementById('edit-img').value = `./image/${cat_id2}/${f.name}`
        //  "./image./" + cat_id + "/" + f.name;
    }
</script>
<script>
    // Lắng nghe sự kiện khi người dùng bấm vào liên kết xoá
    var deleteLinks = document.querySelectorAll(".xoa");
    deleteLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn chuyển hướng đến href

            var productId = this.getAttribute("data-id");
            var confirmation = confirm("Bạn có chắc chắn muốn xoá sản phẩm có ID " + productId + " không?");

            if (confirmation) {
                // Người dùng đã xác nhận muốn xoá, chuyển hướng đến trang xoá hoặc thực hiện hành động xoá ở đây
                window.location.href = "delete-product/" + productId;
            } else {
                // Người dùng đã chọn "Cancel" hoặc đóng hộp thoại xác nhận
                // Không thực hiện hành động xoá
            }
        });
    });
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
<!-- <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>



@endsection
