<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $allproducts = Product::latest()->take(3)->get();
        $menproducts = Product::where('product_category_name','=','Men')->latest()->take(3)->get();
        $womenproducts = Product::where('product_category_name','=','Women')->latest()->take(3)->get();
        $kidproducts = Product::where('product_category_name','=','Kid')->latest()->take(3)->get();

        return view('user_template.home',compact('allproducts','menproducts','womenproducts','kidproducts'));

    }
}
