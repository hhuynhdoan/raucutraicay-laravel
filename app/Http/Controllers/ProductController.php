<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use Session;
use App\cart;

class ProductController extends Controller
{
    //
    public function addproduct(){

        $category = Category::All()->pluck('ten_danhmuc', 'ten_danhmuc');
        return view('admin.add_product')->with('category', $category);
    }

    public function saveproduct(Request $request){

        $this->validate($request, ['ten_sp' => 'required',
                                    'gia_sp' => 'required',
                                    'anh_sp' => 'image|nullable|max:1999']);
    
        if($request->input('ten_danhmuc')){

            if($request->hasFile('anh_sp')){
                //1: get filename with ext
                $fileNameWithExt = $request->file('anh_sp')->getClientOriginalName();
    
                //2: get just filename 
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
                //3: get just extension
                $extension = $request->file('anh_sp')->getClientOriginalExtension();
    
                //4: filename to store 
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
                //upload img
                $path = $request->file('anh_sp')->storeAs('public/anh_sp', $fileNameToStore);
    
            }
            else{
                $fileNameToStore = 'noimage.jpg';
            }
    
    
            $product = new Product();
    
            $product->ten_sp = $request->input('ten_sp');
            $product->gia_sp = $request->input('gia_sp');
            $product->ten_danhmuc = $request->input('ten_danhmuc');
            $product->anh_sp = $fileNameToStore;
            $product->trangthai_sp = 1;
    
            $product->save();
    
            return redirect('/addproduct')->with('status', 'Them san pham '.$product->ten_sp.' thanh cong !');
        }
        else{

            return redirect('/addproduct')->with('status1', 'Vui long chon danh muc san pham !');
        }
        
        

    }
    
    public function product(){
        $product = Product::get();

        // $product = DB::table('products')->paginate(5);

        return view('admin.product')->with('product', $product);
    }
    public function editproduct($id){

        $category = Category::All()->pluck('ten_danhmuc', 'ten_danhmuc');

        $product = Product::find($id);

        return view('admin.edit_product')->with('product', $product)->with('category', $category);
    }

    public function deleteproduct($id){
        $product = Product::find($id);

        $product->delete();

        return redirect('/product')->with('status', 'Xoa san pham '.$product->ten_sp.' thanh cong !');

    }

    public function updateproduct(Request $request){
     
        $this->validate($request, ['ten_sp' => 'required',
                                    'gia_sp' => 'required',
                                    'anh_sp' => 'image|nullable|max:1999']);

        $product = Product::find($request->input('id'));

        $product->ten_sp = $request->input('ten_sp');
        $product->gia_sp = $request->input('gia_sp');
        $product->ten_danhmuc = $request->input('ten_danhmuc');

        if($request->hasFile('anh_sp')){

            //1: get filename with ext
            $fileNameWithExt = $request->file('anh_sp')->getClientOriginalName();
    
            //2: get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just extension
            $extension = $request->file('anh_sp')->getClientOriginalExtension();

            //4: filename to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload img
            $path = $request->file('anh_sp')->storeAs('public/anh_sp', $fileNameToStore);

            $old_image = Product::find($request->input('id'));

            if($old_image->anh_sp != 'noimgage.jpg'){
                Storage::delete('public/anh_sp/'.$old_image->anh_sp);
            }
            $product->anh_sp = $fileNameToStore;
        
        }

        $product->update();
        return redirect('/product')->with('status', 'Cap nhat san pham '.$product->ten_sp.' thanh cong !');

    }

    public function activateproduct($id){
        $product = Product::find($id);

        $product->trangthai_sp = 1;
        $product->update();

        return redirect('/product')->with('status', 'Trang thai san pham '.$product->ten_sp.' cap nhat thanh cong !');

    }

    public function unactivateproduct($id){
        $product = Product::find($id);

        $product->trangthai_sp = 0;
        $product->update();

        return redirect('/product')->with('status', 'Trang thai san pham '.$product->ten_sp.' cap nhat thanh cong !');

    }

    //add to cart
    public function addtocart($id){
        $product = Product::find($id);

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }
}
