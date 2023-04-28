<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
       $pending_orders = Order::where('status','pending')->latest()->get();
        return view('admin.pendingorders',compact('pending_orders'));
    }

    public function Completed(){
        $completed_orders = Order::where('status','completed')->latest()->get();
        return view('admin.completedorders',compact('completed_orders'));

    }

    public function ApproveOrder($id){
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();
        return redirect()->route('completed')->with('message','ORDER HAS BEEN APPROVED');

    }
}
