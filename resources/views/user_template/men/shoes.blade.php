@extends('user_template.layouts.mencate')
@section('product')
    <h1 class="text-left">Men's Shoes</h1>
    @foreach($menshoes as $product)
        <div class="col-lg-4 col-sm-4 product-item">
            <div class="box_main">

                <div class="tshirt_img"><img src="{{asset($product->product_img)}}" alt="{{asset($product->product_img)}}"></div>
                <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                <p class="price_text text-left">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                <div class="btn_main">
                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                    <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id,$product->slug])}}">See More</a></div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
