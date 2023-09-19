@extends('web.master')

@section('title')
Home-Maverick
@endsection

@section('content')

<body>

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
        <form class="section-search-form form-group col-md-9 col-sm-9" id="section-search-form" method="get" action="{{route('web.home.home')}}">
                <span class="section-search-item col-md-3 col-sm-3">
                    <label class="section-search-label" for="xBrand">Brand:</label>
                    <select name="xBrand" id="xBrand" class="section-search-select form-control"
{{--                            onchange="brandChanged()"--}}
                    >
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
{{--                            onchange="brandChanged()"--}}
                    >
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
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    <div class="section-search">
        <p class="row">
            <span class="section-search-total col-md-3 col-12">Total Products: {{$totalProducts}}</span>
            <span class="col-md-1 col-6">Sort By:</span>
{{--            <a id="section-search-recomend" class="section-search-select col-md-2 col-6">Recommend</a>--}}
            <a id="section-search--span__soft-low-to-hight" class="col-md-2 col-4" href="{{ route('web.home.home', ['sort' => 'price_asc']) }}">Price Low to High</a>
            <a id="section-search--span__soft-hight-to-low" class="col-md-2 col-4" href="{{ route('web.home.home', ['sort' => 'price_desc']) }}"> Price High to Low</a>
            <a id="section-search--span__sort-by-name" class="col-md-2 col-4" href="{{ route('web.home.home', ['sort' => 'name_asc']) }}"> Product Name Ascending</a>
            <a id="section-search--span__sort-by-name" class="col-md-2 col-4" href="{{ route('web.home.home', ['sort' => 'name_desc']) }}"> Product Name Descending</a>

        </p>
    </div>
</div>

{{--Sử lý bằng Laravel--}}
    <div class="container-fluid">
        <div id="product-blocks" class="row">
@foreach( $products as $item)
            <a class="data-cart col-md-3 col-sm-6 col-12" >
                <div class="product-block-container" data-id="{{$item->id}}">
                    <img src="{{url($item->img)}}" onclick="chiTiet({{$item->id}})" data-toggle="modal" data-target="#modelChiTietSanPham">
                    <h2 onclick="chiTiet({{$item->id}})" data-toggle="modal" data-target="#modelChiTietSanPham">{{$item->name}}</h2>
                    <img class="product-block-favourite" src="./image/logo/Icon-Heart-Outline-32.png" >
                    <form action="{{url('add-to-cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button style="border: none;background-color: transparent" class="add-to-cart-btn" type="hidden">
                            <img  class="product-block-bag" src="./image/logo/Icon-Bag-Outline-32.png" >
                        </button>
                    </form>
                    <p class="product-block-prices">Price: {{$item->price}}</p>
                </div>
            </a>
@endforeach
        </div>
    </div>






<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện khi nút "Sign up" được nhấn
        $("#show-signup-form-button").click(function() {
            $("#login-form").toggle();  // Ẩn/hiện form đăng nhập
            $("#signup-form").toggle(); // Ẩn/hiện form đăng ký
            var modalTitle = $("#modal-title");
            if (modalTitle.text() === "LOG IN") {
                modalTitle.text("SIGN UP");
            } else {
                modalTitle.text("LOG IN");
            }
            var buttonModal = $("#show-signup-form-button");
            if (modalTitle.text() === "LOG IN") {
                buttonModal.text('Sign up');
            } else {
                buttonModal.text('Login');
            }
        });
    });


</script>
</body>
</html>
@endsection
