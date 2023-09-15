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
    })
    })
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
