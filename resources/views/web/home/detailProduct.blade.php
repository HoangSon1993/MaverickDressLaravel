@extends('web.master')

@section('title')
    Home-Maverick
@endsection

@section('content')
    <!-- Modal chi tiet san pham -->
{{--    <div class="modal fade" id="modelChiTietSanPham" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"--}}
{{--         aria-hidden="true">--}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">DETAIL PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="render1-product">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                             <div class="khoi">
                                 <img src="{{url($product->img)}}" class="col-lg-12 col-md-12 col-sm-12 col-12">
                             </div>
                        </div>
                         <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                             <div class="khoi">
                                <a class="data-cart" >
                                    <div class="product-block-container" data-id="${v.id}">
                                             <h3>{{$product->name}}</h3>
                                            <p style="font-size: 16px" class="product-block-prices">Price: {{$product->price}}&#36;</p>
                                             <div class="product-block-bag"></div>
                                             <div class="top-basket-remove" onclick= "Remove('${v.id}')">
                                                 </div>
                                             </div>
                                         </a>
                                 </div>
                             </div>
                    </div>
                    <div class="row" id="render2-product">
                        <div class="col-12">
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Descriptions
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            {{$product->description}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Product detail
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            {{$product->detail}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer ">
                        <button type="button " class="btn btn-secondary" onclick="redirectToCheckout('{{route('web.home.home')}}')">Close</button>
                        <form action="{{url('add-to-cart')}}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <button type="button " class="btn btn-primary save add-to-cart-btn" onclick="redirectToCheckout('{{route('web.home.home')}}')">THÊM VÀO GIỎ HÀNG</button>
{{--                            <button style="border: none;background-color: transparent" class="add-to-cart-btn" type="hidden">--}}
{{--                                <img  class="product-block-bag" src="./image/logo/Icon-Bag-Outline-32.png" >--}}
{{--                            </button>--}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection
