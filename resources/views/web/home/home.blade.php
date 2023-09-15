@extends('web.master')

@section('title')
Home-Maverick
@endsection

@section('content')

<body>

<div class="container-fluid">
    <div id="top-bar-inner" class="row">
        <div class="top-bar-link col-md-4 col-sm-4">NGUYEN TU - Student1457484</div>
        <div class="top-bar-divider col-md-1 col-sm-1">|</div>
        <div class="top-bar-link col-md-2 col-sm-2">ACCP2302</div>
        <div class="top-bar-divider col-md-1 col-sm-1">|</div>
        <div class="top-bar-link col-md-4 col-sm-4">LY HOANG SON - Student1457465</div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="top-banner">
        <div class="col-lg-4 col-md-4 col-12" id="top-banner-logo">
            <a href="./index.html" title="Maverick Dress">
                <img src="{{url('./image/logo/MTC_FinalLogos-01.png')}}" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-8" id="top-banner-search">
            <input class="search-text" type="text" name="xSearch" value="" placeholder="Search" maxlength="40"
                   id="search_input">
            <input id="search-button" class="search-button" type="button" value="">
        </div>
        <div class="col-lg-4 col-md-4 col-4 justify-content-end row" id="top-banner-icons">
            <div class="col-2" id="top-banner-icons-welcome">
                <a href="#"  data-toggle="modal" data-target="#modal-login">Log in</a>
                <div class="modal" id="modal-login">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">LOG IN</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form class="px-4 py-3">
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleDropdownFormPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                        <label class="form-check-label" for="dropdownCheck">
                                            Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Sign up</a>
                                <a class="dropdown-item" href="#">Forgot password?</a>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2" id="top-banner-icons-account">
                <a title="My Account" data-toggle="modal" data-target="#modal-account"></a>
                <div class="modal" id="modal-account">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ACCOUNT</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis voluptatibus placeat cumque itaque! Laudantium, distinctio corrupti sapiente laborum in beatae?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2" id="top-banner-icons-favourites" onclick="heart()">
                <a title="My Saved Items" data-toggle="modal" data-target="#modal-heart"><span id="top-banner-icon-favourites-qty"></span></a>
                <div class="modal" id="modal-heart">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">HEART</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis voluptatibus placeat cumque itaque! Laudantium, distinctio corrupti sapiente laborum in beatae?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2" id="top-banner-icons-basket">
                <a title="My Bag" data-toggle="modal" data-target="#modal-bag"><span id="top-banner-icon-basket-qty"></span></a>
                <div class="modal" id="modal-bag">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">BAG</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="cart-product row">


                                </div>
                                <div class="cart-total">
                                    <div class="cart-total-title">
                                        <h2>Total</h2>
                                    </div>
                                    <div class="cart-total-price justify-content-end"></div>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger">Buy</button>

                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light row">
    <a class="navbar-brand col-lg-2 col-9" href="#">
        <h2>HOME</h2>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-aboutus">ABOUT US</a>
                <div class="modal" id="modal-aboutus">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ABOUT MAVERICK DRESS</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis voluptatibus placeat cumque itaque! Laudantium, distinctio corrupti sapiente laborum in beatae?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">BRAND</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-item-sale" href="#">SALE</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    PRODUCTS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-contactus">CONTACT US</a>
                <div class="modal" id="modal-contactus">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">CONTACT US</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div id="info-page">

                                    <h2>Helpline Number</h2>

                                    <p>In case of any query please call one of our customer service representatives on
                                        <a href="#">000</a> or email <a href="#">exam@gmail.com</a></p>
                                    <p>Our helpline is staffed between 9:30am and 4:30pm Monday to Friday.</p>

                                    <h2>Contact and Company Details</h2>

                                    <ul class="link-list">
                                        <li>
                                            <span class="link-list-title">Email </span>
                                            <span class="link-list-info"><a href="#"></a></span>
                                        </li>
                                        <li>
                                            <span class="link-list-title">Telephone</span>
                                            <span class="link-list-info">                                    </span>
                                        </li>

                                        <li>
                                            <span class="link-list-title">Zalo</span>
                                            <span class="link-list-info">000 0000 000</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-help">HELP</a>
                <div class="modal" id="modal-help">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">HELP</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Obcaecati placeat eos unde a, expedita ipsum perferendis in? Fuga, molestiae. Rerum.
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <marquee class="row" behavior="alternate" direction="">
        <div id="home-page-brands">
            <div class="home-page-brands-row">
                <div class="home-page-brand-logo">
                    <a href="" title="One+All Schoolwear">
                        <img src="{{url('./image/brand/One-All.png')}}" alt="One+All Schoolwear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="Banner Schoolwear">
                        <img src="{{url('./image/brand/Banner.png')}}" alt="Banner Schoolwear">
                    </a>
                </div>

                <div class="home-page-brand-logo">
                    <a href="" title="Trutex Schoolwear">
                        <img src="{{url('./image/brand/Trutex.png')}}" alt="Trutex Schoolwear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="Winterbottom's Schoolwear">
                        <img src="url('./image/brand/Winterbottoms.png')" alt="Winterbottom's Schoolwear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="Akoa Sportswear">
                        <img src="{{url('./image/brand/Akoa.png')}}" alt="Akoa Sportswear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="Falcon Sportswear">
                        <img src="{{url('./image/brand/Falcon.png')}}" alt="Falcon Sportswear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="JUCO Sportswear">
                        <img src="url('./image/brand/JUCO.png)" alt="JUCO Sportswear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="Chadwick Teamwear">
                        <img src="{{url('./image/brand/Term-Footwear.png')}}" alt="Chadwick Teamwear">
                    </a>
                </div>
                <div class="home-page-brand-logo">
                    <a href="" title="David Luke Schoolwear">
                        <img src="{{url('./image/brand/David-Luke.png')}}" alt="David Luke Schoolwear">
                    </a>
                </div>
            </div>
        </div>
    </marquee>
</div>
<div class="container-fluid">
    <div class="row section-search">
        <p class="col-md-12 col-sm-12">Find your ideal here </p>
        <form class="section-search-form form-group col-md-9 col-sm-9" id="section-search-form">
                <span class="section-search-item col-md-3 col-sm-3">
                    <label class="section-search-label" for="xBrand">Brand:</label>
                    <select name="xBrand" id="xBrand" class="section-search-select form-control"
                            onchange="brandChanged()">
                        <option value="" selected="selected">All</option>
                        <option value="banner">Banner</option>
                        <option value="david-luke">David-luke</option>
                        <option value="one-all">One-all</option>
                        <option value="trutex">Trutex</option>
                    </select>
                </span>
            <span class="section-search-item col-md-3 col-sm-3">
                    <label class="section-search-label">Color</label>
                    <select name="xColour" id="xColour" class="section-search-select form-control"
                            onchange="brandChanged()">
                        <option value="" selected="selected">All</option>
                        <option value="amber">Amber</option>
                        <option value="black">Black</option>
                        <option value="bottle-green">Bottle Green</option>
                        <option value="burgundy">Burgundy</option>
                        <option value="dark-royal">Dark Royal</option>
                        <option value="emerald">Emerald</option>
                        <option value="grey">Grey</option>
                        <option value="jade">Jade</option>
                        <option value="marl-grey">Marl Grey</option>
                        <option value="maroon">Maroon</option>
                        <option value="navy">Navy</option>
                        <option value="purple">Purple</option>
                        <option value="red">Red</option>
                        <option value="royal">Royal</option>
                        <option value="scarlet">Scarlet</option>
                        <option value="school-grey">School Grey</option>
                        <option value="sky">Sky</option>
                    </select>
                </span>
            <span class="section-search-item col-md-3 col-sm-3">
                    <label class="section-search-label multi-line">Gender</label>
                    <select name="gender" id="gender" class="section-search-select form-control"
                            onchange="brandChanged()">
                        <option value="" selected="selected">All</option>
                        <option value="men">Male</option>
                        <option value="women">Female</option>
                        <option value="unisex">Unisex</option>
                    </select>
                </span>
        </form>
    </div>
    <div class="section-search">
        <p class="row">
            <span class="section-search-total col-md-3 col-12">Total Products: ..</span>
            <span class="col-md-1 col-6">Sort By:</span>
            <a id="section-search-recomend" class="section-search-select col-md-2 col-6">Recommend</a>
            <a id="section-search--span__soft-low-to-hight" class="col-md-2 col-4">Price Low to High</a>
            <a id="section-search--span__soft-hight-to-low" class="col-md-2 col-4"> Price High to Low</a>
            <a id="section-search--span__sort-by-name" class="col-md-2 col-4"> Product Name</a>
        </p>
    </div>
</div>

{{--Sử lý bằng Laravel--}}
    <div class="container-fluid">
        <div id="product-blocks" class="row">
@foreach( $products as $item)
            <a class="data-cart" >
                <div class="product-block-container" data-id="{{$item->id}}">
                    <img src="{{url($item->img)}}" onclick="chiTiet({{$item->id}})" data-toggle="modal" data-target="#modelChiTietSanPham">
                    <h2 onclick="chiTiet({{$item->id}})" data-toggle="modal" data-target="#modelChiTietSanPham">{{$item->name}}</h2>
                    <img class="product-block-favourite" src="./image/logo/Icon-Heart-Outline-32.png" >
                    <img class="product-block-bag" src="./image/logo/Icon-Bag-Outline-32.png" >
                    <p class="product-block-prices">Price: {{$item->price}}</p>
                </div>
            </a>
@endforeach
        </div>
    </div>





<!-- Modal chi tiet san pham -->
<div class="modal fade" id="modelChiTietSanPham" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THÔNG TIN SẢN PHẨM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="render1-product">

                </div>
                <div class="row" id="render2-product">


                </div>
                <!-- <div class=" modal-footer ">
                    <button type="button " class="btn btn-secondary " data-dismiss="modal ">Close</button>
                    <button type="button " class="btn btn-primary save ">THÊM VÀO GIỎ HÀNG</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
</body>

</html>
@endsection
