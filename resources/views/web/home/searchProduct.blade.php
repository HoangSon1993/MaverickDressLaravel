@extends('web.master')

@section('title')
    Home-Maverick
@endsection

@section('content')

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

@endsection
