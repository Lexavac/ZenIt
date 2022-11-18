<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\ImageUploadingTrait;

class CartController extends Controller
{
    use ImageUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carts = Cart::All();
        return view('frontend.cart.index', compact('carts'));

    }

    public function inc(Request $request, $id)
    {
        $check = Cart::where('id', $id)->where('user_ip', auth()->id())->first();



        $check->quantity = $check->quantity + 1 ;

        $check->update();

        return redirect()->back();

    }

    public function dec(Request $request, $id)
    {
        $check = Cart::where('id', $id)->where('user_ip', Auth()->id())->first();

        $check->quantity = $check->quantity - 1 ;

        $check->update();

        return redirect()->back();

    }



    public function CartPage(Product $product)


    {
      $carts = Cart::where('user_ip', Auth()->id())->latest()->get();
        return view('frontend.cart.index', compact('carts', 'product'));
    }

    public function CartTab(){
        $carts = Cart::where('user_ip', Auth()->id())->latest()->get();



        return view('frontend.cart.index', compact('carts', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $product_name)
    {

        $check = Cart::where('product_name', $request->name)->where('user_ip', Auth()->id())->first();
        if ($check){
            $prod = Cart::where('product_name', $request->name)->where('user_ip', Auth()->id())->first();
            $prod->quantity += 1;
            $prod->update();
            return Redirect()->back()->with([
                'message' => 'Add More Cart Success !',
                'type' => 'warning'
            ]);
        }else {

            Cart::insert([
                'product_name' => $request->name,
                'quantity' => 1,
                'price' => $request->price,
                'user_ip' => Auth()->id(),
                'image' => $request->image,
            ]);
            return Redirect()->back()->with([
                'message' => 'Add Cart Success !',
                'type' => 'info'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete(); // Easy right?

        return redirect()->back()->with([
            'message' => 'Delete successfully!',
            'type' =>  'danger'
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_name');
    }

    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery');
    }


}
