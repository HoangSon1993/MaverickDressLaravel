
<div class="container-fluid">
    <div id="top-bar-inner" class="row">
        <div class="top-bar-link col-md-4 col-sm-4">NGUYEN TU - Student1457484</div>
        <div class="top-bar-divider col-md-1 col-sm-1">|</div>
        <div class="top-bar-link col-md-2 col-sm-2">ACCP2302</div>
        <div class="top-bar-divider col-md-1 col-sm-1">|</div>
        <div class="top-bar-link col-md-4 col-sm-4">HOANG SON - Student1457465</div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="top-banner">
        <div class="col-lg-4 col-md-4 col-12" id="top-banner-logo">
            <a href="{{route('web.home.home')}}" title="Maverick Dress">
                <img src="{{url('./image/logo/MTC_FinalLogos-01.png')}}" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-8" id="top-banner-search">
            <form action="{{route('web.home.search')}}" method="get">
                @csrf
                <input class="search-text" type="text" name="search" placeholder="Search Products" maxlength="40"
                       id="search_input">
                <button class="search-button"  type="submit"></button>
            </form>

        </div>
        <div class="col-lg-4 col-md-4 col-4 justify-content-end row" id="top-banner-icons">
            <div class="col-2" id="top-banner-icons-welcome">
                {{--                @dd(auth()->user())--}}
                @if(Auth::check())
                    <a href="#"> {{auth()->user()->name}}</a>
                @else
                    <a href="#"  data-toggle="modal" data-target="#modal-login">Log in</a>
                    <div class="modal" id="modal-login">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modal-title">LOG IN</h4>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="px-4 py-3" action="{{ route('login') }}" method="post" id="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">Email address</label>
                                            <input name="email" type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormPassword1">Password</label>
                                            <input name="password" type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                                        </div>
                                        {{--                                    <div class="form-check">--}}
                                        {{--                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">--}}
                                        {{--                                        <label class="form-check-label" for="dropdownCheck">--}}
                                        {{--                                            Remember me--}}
                                        {{--                                        </label>--}}
                                        {{--                                    </div>--}}
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                    <form class="px-4 py-3" id="signup-form"  method="post" style="display: none;">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input name="name" type="email" class="form-control" id="name" placeholder="name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">Email address</label>
                                            <input name="email" type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormPassword1">Password</label>
                                            <input name="password" type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" value="">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign up</button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <button type="button" id="show-signup-form-button" class="btn btn-link">Sign up</button>
                                    {{--                                <a class="dropdown-item" href="#">Forgot password?</a>--}}

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if(Auth::check())
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
                                    <form class="form" action="{{ route('profile') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="email" disabled value="{{ auth()->user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}"><br>
                                        </div>
                                        {{--                                    <div class="form-group">--}}
                                        {{--                                        <lable class="form-check-label">chage to password</lable>--}}
                                        {{--                                        <input class="form-control" type="checkbox" name="change_password">--}}
                                        {{--                                        --}}
                                        {{--                                    </div>--}}
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <input class="form-control" type="password" name="password" placeholder="password">
                                                    <input  class="form-control" type="checkbox" name="change_password">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-append">
                                                <button class="btn btn-info mr-2" type="submit">Update</button>
                                                <a class="btn btn-danger mr-2" style="background-image: none; max-width:80px " href="{{route('logout')}}">Log out</a>
                                                @if(Auth::check())
                                                    <a class="btn btn-primary" style="background-image: none; max-width:120px " href="{{route('admin.home.get-product')}}">Log in Admin</a>
                                                @endif
                                            </div>

                                        </div>
                                    </form>
                                    @if(session('success'))
                                        {{ session('success') }}
                                    @endif
                                    {{--                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis voluptatibus placeat cumque itaque! Laudantium, distinctio corrupti sapiente laborum in beatae?--}}
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
                    @php
                        $cart_array = cardArray();
                    @endphp
                    <a title="My Bag" data-toggle="modal" data-target="#modal-bag">
                        <span id="top-banner-icon-basket-qty"><?= count($cart_array) ?></span>
                    </a>
                    <div class="modal" id="modal-bag">
                        <div class="modal-dialog">x
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">BAG</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="cart-product row">
                                        @foreach($cart_array as $v_add_cart)
                                            @php
                                                $images = isset($v_add_cart['attributes'][0]) ? $v_add_cart['attributes'][0] : null ;

                                            @endphp

                                            @if($images !== null)
                                                {{--                                        <div class="product-widget">--}}
                                                {{--                                            <div class="product-img">--}}
                                                {{--                                                <img src="{{url($images)}}" alt="">--}}
                                                {{--                                            </div>--}}
                                                {{--                                            <div class="product-body">--}}
                                                {{--                                                <h3 class="product-name"><a href="#">{{$v_add_cart['name']}}</a></h3>--}}
                                                {{--                                                <h4 class="product-price"><span class="qty">{{$v_add_cart['quantity']}}x</span>&#36;{{$v_add_cart['price']}}</h4>--}}
                                                {{--                                                <a href="{{url('delete-cart/'.$v_add_cart['id'])}}" class="delete">x<i class="fa fa-close"></i></a>--}}
                                                {{--                                            </div>--}}
                                                {{--                                        </div>--}}

                                                <div class="product-block-container" data-id="${v.id}">
                                                    <img src="{{url($images)}}" onclick="chiTiet('{{$v_add_cart['id']}}')" data-toggle="modal" data-target="#modelChiTietSanPham">
                                                    <h2 onclick="chiTiet('{{$v_add_cart['id']}}')" data-toggle="modal" data-target="#modelChiTietSanPham">
                                                        {{$v_add_cart['id']}}-{{$v_add_cart['name']}}</h2>
                                                    {{--                                                <div class="product-block-favourite"></div>--}}
                                                    {{--                                                <input class="cart-quantity-input .form-control" type="number" value="1" >--}}
                                                    <p class="product-block-prices">{{$v_add_cart['quantity']}} x {{$v_add_cart['price']}}&#36;</p>
                                                    {{--                                                <div class="top-basket-remove" onclick= "Remove(${v.id})">--}}
                                                    <a style="background-image: none" class="top-basket-remove delete close" href="{{url('delete-cart/'.$v_add_cart['id'])}}" >x</a>
                                                    {{--                                                </div>--}}
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="cart-total">
                                        <div class="cart-total-title">
                                            <smaill><?=count($cart_array) ?> Item(s) selected</smaill>
                                            <h5>Total:&#36; {{Cart::getTotal()}}</h5>
                                        </div>
                                        <div class="cart-total-price justify-content-end"></div>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" onclick="redirectToCheckout('{{url('/checkout')}}')">Buy</button>

                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    {{--                                <a href="">View cart</a>--}}
                                    {{--                                <a href="{{url('/checkout')}}">Check out</a>--}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light row">
    <a class="navbar-brand col-lg-2 col-9" href="{{route('web.home.home')}}">
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
                        <img src="{{url('./image/brand/Winterbottoms.png')}}" alt="Winterbottom's Schoolwear">
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
                        <img src="{{url('./image/brand/JUCO.png')}}" alt="JUCO Sportswear">
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
