<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function CategoryPage(){
//        $category = Category::findOrFail($id);
//        $products = Product::where('product_subcategory_id',$id)->latest()->get();
        $products= Product::latest()->get();
        return view('user_template.category', compact('products'));
    }
    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id',$subcat_id)->latest()->get();

        return view('user_template.product',compact('product','related_products'));
    }
    public function AddToCart(){
        $userid= Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        return view('user_template.addtocart', compact('cart_items'));
}
public function Checkout(){
    $userid= Auth::id();
    $cart_items = Cart::where('user_id',$userid)->get();
    $shipping_address = Shipping_info::where('user_id',$userid)->first();

        return view('user_template.checkout', compact('cart_items','shipping_address'));
}
public function UserProfile(){
        return view('user_template.userprofile');
}

    public function NewRelease(){
        return view('user_template.newrelease');
    }



public function TodayDeal(){
        return view('user_template.todaydeal');
}
    public function CustomerService(){
        return view('user_template.customerservice');
    }

    public function PendingOrders(){
        $userid= Auth::id();
       $pending_orders = Order::where('user_id',$userid)->get();
        return view('user_template.pedingorders',compact('pending_orders'));
    }

    public function History(){
        $userid= Auth::id();
        $completed = Order::where('user_id',$userid)->get();
        return view('user_template.history',compact('completed'));
    }


    public function AddProductToCart(Request $request){
            $product_price = $request->price;
            $quantity = $request->quantity;
            $price = $product_price * $quantity;
        Cart::insert([
           'product_id'=> $request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$price
        ]);
        return redirect()->route('addtocart')->with('message', 'Item added To Cart Successfully!');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Item Have Been Removed From Cart Successfully!');
    }

    public function Shipping(){
        return view('user_template.shipping');
    }

    public function AddShippingAddress(Request $request){
        Shipping_info::insert([
            'user_id'=>Auth::id(),
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'city'=>$request->city,
            'address_1'=>$request->address_1,
            'address_2'=>$request->address_2,
            'postal_code'=>$request->postal_code,
            'phone_number'=>$request->phone_number,

        ]);
    return redirect()->route('checkout');
    }

    public function PlaceOrder(){
        $userid= Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get();
        $shipping_address = Shipping_info::where('user_id',$userid)->first();

        foreach ($cart_items as $item){
            Order::insert([
                'user_id'=>$userid,
                'shipping_phonenumber'=>$shipping_address->phone_number,
                'shipping_address'=>$shipping_address->address_1,
                'shipping_city'=>$shipping_address->city,
                'shipping_postalcode'=>$shipping_address->postal_code,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,
            ]);
            $id = $item->id;
            Cart::findOrFail($id)->delete();

        }
        Shipping_info::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'You Order Has Been Placed Successfully!');
    }
    public function Logout()
    {
        Auth::logout(); // logs out the currently authenticated user
        return redirect('/login'); // redirects the user to the login page after logout
    }

    public function MenProduct(){
        $menproduct=Product::where('product_category_name','=','Men')->latest()->get();
        return view('user_template.men.allproduct',compact('menproduct'));
    }
    public function MenClothing(){
        $menclothing=Product::where('product_subcategory_name','=','Men-clothing')->latest()->get();
        return view('user_template.men.clothing',compact('menclothing'));

    }
    public function MenShoes(){
        $menshoes=Product::where('product_subcategory_name','=','Men-shoes')->latest()->get();
        return view('user_template.men.shoes',compact('menshoes'));


    }
    public function MenAccessories(){
        $menacc=Product::where('product_subcategory_name','=','Men-accessories')->latest()->get();
        return view('user_template.men.accessories',compact('menacc'));

    }

    public function WomenProduct(){
        $womenproduct=Product::where('product_category_name','=','Women')->latest()->get();
        return view('user_template.women.allproduct',compact('womenproduct'));
    }
    public function WomenClothing(){
        $womenclothing=Product::where('product_subcategory_name','=','Women-clothing')->latest()->get();
        return view('user_template.women.clothing',compact('womenclothing'));

    }
    public function WomenShoes(){
        $womenshoes=Product::where('product_subcategory_name','=','Women-shoes')->latest()->get();
        return view('user_template.women.shoes',compact('womenshoes'));


    }
    public function WomenAccessories(){
        $womenacc=Product::where('product_subcategory_name','=','Women-accessories')->latest()->get();
        return view('user_template.women.accessories',compact('womenacc'));

    }


    public function KidProduct(){
        $kidproduct=Product::where('product_category_name','=','Kid')->latest()->get();
        return view('user_template.Kid.allproduct',compact('kidproduct'));
    }
    public function KidClothing(){
        $kidclothing=Product::where('product_subcategory_name','=','Kid-clothing')->latest()->get();
        return view('user_template.kid.clothing',compact('kidclothing'));

    }
    public function KidShoes(){
        $kidshoes=Product::where('product_subcategory_name','=','Kid-shoes')->latest()->get();
        return view('user_template.kid.shoes',compact('kidshoes'));


    }
    public function KidAccessories(){
        $kidacc=Product::where('product_subcategory_name','=','Kid-accessories')->latest()->get();
        return view('user_template.kid.accessories',compact('kidacc'));

    }

}
