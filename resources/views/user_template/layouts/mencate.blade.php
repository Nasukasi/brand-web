@extends('user_template.layouts.template')
@section('title_page')
    Men
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('men-product')}}">All</a></li>
                        <li><a href="{{route('men-clothing')}}">Men's Clothing</a></li>
                        <li><a href="{{route('men-shoes')}}">Men's Shoes</a></li>
                        <li><a href="{{route('men-accessories')}}">Men's Accessories</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('product')

                </div>
            </div>
        </div>
    </div>
@endsection
