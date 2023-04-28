@extends('user_template.layouts.template')
@section('title_page')
    Women
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('women-product')}}">All</a></li>
                        <li><a href="{{route('women-clothing')}}">Women's Clothing</a></li>
                        <li><a href="{{route('women-shoes')}}">Women's Shoes</a></li>
                        <li><a href="{{route('women-accessories')}}">Women's Accessories</a></li>
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
