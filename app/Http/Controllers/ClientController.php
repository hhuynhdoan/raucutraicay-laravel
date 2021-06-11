<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use Session;
use App\cart;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller
{
    //
    public function home(){
        $product = Product::get();
        $slider = Slider::get();

        return view('client.home')->with('slider', $slider)->with('product', $product);
        
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new cart($oldCart);
        return view('client.cart', ['product' => $cart->items]);
    }
    public function shop(){
        $slider = Slider::get();
        $product = Product::get();
        $category = Category::get();

        return view('client.shop')->with('product', $product)->with('category', $category)->with('slider', $slider);
    }
    public function updateqty(Request $request){
        //print('the product id is '.$request->id.' And the product qty is '.$request->quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new cart($oldCart);
        $cart->updateqty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/cart');

    }

    public function removeItem($product_id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/cart');
    }
    public function login(){
        return view('client.login');
    }
    
    public function signup(){
        return view('client.signup');
    }

    public function checkout(){
        if(Session::has('cart')){
            return view('.client.checkout');

        }
        return redirect('/cart');
    }

    public function postcheckout(Request $request){
        if(Session::has('cart')){
            return redirect('/cart');

        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new cart($oldCart);
        
        Stripe::setApiKey('sk_test_51J0M6pA3eplkkY0Bz61XilblFgARDnub0lBZN2vJuY7ZisXBfcIcqkVMvcsV7bWbbL4RNuR6LBDtU2CLEcIBq4RW00hHvh1TJV');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtain~ed with Stripe.js
                "description" => "Test Charge"
            ));

          

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
        // Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/cart')->with('success', 'Purchase accomplished successfully !');
    }

    public function productsingle($id){

        $product = Product::find($id);


        return view('client.product_single')->with('product', $product);
    }
}
