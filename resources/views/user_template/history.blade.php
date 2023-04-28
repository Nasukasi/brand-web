@extends('user_template.layouts.user_profile_template')
@section('title_page')
    history
@endsection
@section('profilecontent')
    <div class="container my-5">
        <div class="card p-4">

            <div class="card-title text-center"><h2>History Orders</h2>
            </div>
            <div class="card-body">
    <table class="table">
        <tr>
            <th>Product ID</th>
            <th>Price</th>
        </tr>
        @foreach($completed as $order)

            <tr>
                @php
                    $product_id = App\Models\Order::where('id',$order->product_id)->where('status','completed')->value('product_id');
                    $price = App\Models\Order::where('id',$order->product_id)->where('status', 'completed')->value('total_price');
                @endphp
                <td>{{$product_id}}</td>

                <td>{{$price}}</td>
            </tr>

    @endforeach
    </table>
            </div>
        </div>
    </div>

@endsection
