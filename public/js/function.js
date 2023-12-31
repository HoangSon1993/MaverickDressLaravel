//Dinh nghia ham
let bag = [];

function loadData(arr) {
    let s = '';
    $.each(arr, function(i, v) {
        s += `<a class="data-cart" >
        <div class="product-block-container" data-id="${v.id}">
        <img src="${v.img}" onclick="chiTiet(${v.id})" data-toggle="modal" data-target="#modelChiTietSanPham">
        <h2 onclick="chiTiet(${v.id})" data-toggle="modal" data-target="#modelChiTietSanPham">${v.id}-${v.name}</h2>
        <img class="product-block-bag" src="./image/logo/Icon-Bag-Outline-32.png" >
        <p class="product-block-prices">Price: ${v.price}</p>
        </div>
        </a>`
    })
    $('#product-blocks').html(s)
    $('.section-search .section-search-total').html("Total Products: " + arr.length)
    let list = document.querySelectorAll('#product-blocks a .product-block-container');
    list.forEach(item => {
            item.addEventListener('click', function(event) {
                // su kien click cho bag
                if (event.target.classList.contains('product-block-bag')) {
                    // var itemNew = item.cloneNode(true);
                    let idbag = this.getAttribute('data-id');
                    console.log(idbag);
                    let checkIsset = false;
                    let listCart = document.querySelectorAll('#top-banner-icons-basket #modal-bag .modal-dialog .modal-body .cart-product');
                    listCart.forEach(cart => {
                        if (cart.getAttribute('data-id') == idbag) {
                            checkIsset = true;
                        }
                    })
                    if (checkIsset == false) {
                        let bagitem = '';
                        let tong = 0;
                        $.each(product, function(k, v) {
                            if (v.id == idbag) {
                                bagitem = `
                            <div class="product-block-container" data-id="${v.id}">
                            <img src="${v.img}" onclick="chiTiet(${v.id})" data-toggle="modal" data-target="#modelChiTietSanPham">
                            <h2 onclick="chiTiet(${v.id})" data-toggle="modal" data-target="#modelChiTietSanPham">${v.id}-${v.name}</h2>
                            <div class="product-block-favourite"></div>
                            <input class="cart-quantity-input .form-control" type="number" value="1" >
                            <p class="product-block-prices">Price: ${v.price}</p>
                            <div class="top-basket-remove" onclick= "Remove(${v.id})"></div>
                            </div>
                            `
                                bag.push(bagitem);
                            }
                            $('#top-banner-icons-basket #modal-bag .modal-dialog .modal-body .cart-product').html(bag);
                        })
                    }
                    // su kien click cho heart

                    //Them number cho Bag
                    let listCart1 = document.querySelectorAll('#top-banner-icons-basket #modal-bag .modal-dialog .cart-product .product-block-container');
                    document.getElementById('top-banner-icon-basket-qty').innerHTML = listCart1.length;
                    var total = 0;
                    for (var i = 0; i < listCart1.length; i++) {
                        var cart_id = listCart1[i].getAttribute('data-id');
                        var prices = arr[cart_id].price;
                        var quantity = listCart1[i].getElementsByClassName('cart-quantity-input');
                        console.log(quantity)
                        var number = quantity * 1 // lấy giá trị trong thẻ input
                        total = total + (prices * number)
                    }
                    $('#top-banner-icons-basket #modal-bag .modal-dialog .modal-body .cart-total .cart-total-price').html(total);

                    //Them number cho Heart
                }
            })
        })
        // SET day
        intervalId = window.setInterval(function() {
            var d = new Date();
            document.getElementById("time").innerHTML = d;
        }, 1000);
}
//   total


function Remove(v) {
    let listCart = document.querySelectorAll('#top-banner-icons-basket #modal-bag .modal-dialog .modal-body .cart-product .product-block-container');
    for (var i = 0; i < listCart.length; i++) {
        if (listCart[i].getAttribute('data-id') == v) {
            listCart[i].remove();
            bag.splice(i, 1);
            return;
        }
    }
    document.getElementById('top-banner-icon-basket-qty').innerHTML = listCart.length - 1;
}

function timkiem(data, query) {

    return data.filter(items => JSON.stringify(items).toLowerCase().includes(query.toLowerCase()))
}

function search_all() {
    var query = $('#search_input').val().toLowerCase();
    product_timkiem = timkiem(product, query)
    loadData(product_timkiem)
}

function search_by_name() {
    var query = $('#search_input').val().toLowerCase();
    product_timkiem = timkiem(product, query)
    let s = []
    $.each(product_timkiem, function(key, value) {
        s.push(value.name)
    });
    $("#search_input").autocomplete({
        source: s
    });
}

function sortByName(a, b) {
    const nameA = a.name.toUpperCase();
    const nameB = b.name.toUpperCase();
    if (nameA < nameB) { return -1; }
    if (nameA > nameB) { return 1 }
    return 0;
}

function sortByValueIncrease(a, b) {
    return a.price * 1 - b.price * 1;
    // sap xep tang dan:
    // neu a < b thi a-b <0 --> a va b giu nguyen vi tri
    // neu a>b thi a-b>0 --> a va b doi vi tri cho nhau
}

function sortByValueDecrease(a, b) {
    return b.price * 1 - a.price * 1;
}

function chiTiet(id) {
    window.location.href = 'detail-product/'+id;
    // localStorage.setItem("idProduct", id)
    // let s1, s2 = ''
    // $.each(product, function(k, v) {
    //     if (v.id == id) {
    //         s1 = `
    //             <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    //                 <div class="khoi">
    //                     <img src="${v.img}" class="col-lg-12 col-md-12 col-sm-12 col-12">
    //                 </div>
    //             </div>
    //             <div class="col-lg-8 col-md-6 col-sm-6 col-12">
    //                 <div class="khoi">
    //                 <a class="data-cart" >
    //                 <div class="product-block-container" data-id="${v.id}">
    //                     <h1>${v.name}</h1>
    //                     <p class="product-block-prices">Price: ${v.price}</p>
    //                     <div class="product-block-favourite"></div>
    //                     <div class="product-block-bag"></div>
    //                     <div class="top-basket-remove" onclick= "Remove(${v.id})">
    //                     </div>
    //                     </div>
    //                     </a>
    //                 </div>
    //             </div>
    //                 `
    //         s2 = `
    //         <div class="col-12">
    //         <div class="accordion mt-3" id="accordionExample">
    //         <div class="card">
    //             <div class="card-header" id="headingTwo">
    //                 <h2 class="mb-0">
    //                     <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Descriptions
    //                     </button>
    //                 </h2>
    //             </div>
    //             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
    //                 <div class="card-body">
    //                     ${v.description}
    //                 </div>
    //             </div>
    //         </div>
    //         <div class="card">
    //             <div class="card-header" id="headingOne">
    //                 <h2 class="mb-0">
    //                     <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Product detail
    //         </button>
    //                 </h2>
    //             </div>
    //
    //             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
    //                 <div class="card-body">
    //                     ${v.detail}
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    //     </div>
    //     `
    //     }
    // })
    // $('#render1-product').html(s1)
    // $('#render2-product').html(s2)
}

function brandChanged(obj) {
    var query1 = $('#xBrand').val().toLowerCase();
    var query2 = $('#xColour').val().toLowerCase();
    var query3 = $('#gender').val().toLowerCase();
    product_timkiem1 = timkiem(product, query1)
    product_timkiem2 = timkiem(product_timkiem1, query2)
    product_timkiem3 = timkiem(product_timkiem2, query3)
    loadData(product_timkiem3)
}

function redirectToCheckout(url) {
    window.location.href= url;
}
