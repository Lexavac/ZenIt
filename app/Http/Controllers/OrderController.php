<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function storeOrder(Request $request)
    {


        $request->validate([
           'shipping_first_name' => 'required',
           'shipping_last_name' => 'required',
        ]);


        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000 ,99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'created_at' => Carbon::now(),
        ]);



        $carts = Cart::where('user_ip', auth()->id())->latest()->get();

        foreach ($carts as $cart) {
            OrderItem::insert([

                'order_id' => $order_id,
                'product_id' => Auth()->id(),
                'product_name' => $cart->product_name,
                'product_qty' => $cart->quantity,
                'created_at' => Carbon::now(),

            ]);
        }

        Shipping::insert([
            'order_id' => $order_id,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'adress' => $request->adress,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'created_at' => Carbon::now(),
        ]);

        Cart::where('user_ip', auth()->id())->delete();
        return Redirect()->to('order/success')->with([
            'message' => 'Your Order Complete !',
            'type' => 'info'
        ]);



        // Cart::where('user_ip', auth()->id())->delete();
        // return redirect()->back()->with('cart_update', 'Quantity Update');

    }

    public function orderSuccess()
    {
        return view('frontend.order.complete');
    }
}
