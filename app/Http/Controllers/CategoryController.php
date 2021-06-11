<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function addcategory(){
        return view('admin.add_category');
    }
 
    //them danh muc
    public function savecategory(Request $request){

        $this->validate($request, ['ten_danhmuc' => 'required']);
        
        $checkcat = Category::where('ten_danhmuc', $request->input('ten_danhmuc'))->first();
        
        $category = new Category();

        if(!$checkcat){

            $category->ten_danhmuc = $request->input('ten_danhmuc');
            $category->save();

            return redirect('/addcategory')->with('status', 'Them danh muc '.$category->ten_danhmuc.' thanh cong !');

        }else{

            return redirect('/addcategory')->with('status1', 'Them danh muc '.$request->input('ten_danhmuc').' khong thanh cong !');

        }
    }

    //hien thi danh muc
    public function category(){

        $category = Category::get();

        return view('admin.category')->with('category', $category);
    }

    //sua danh muc
    public function editcategory($id){
        $category = Category::find($id);

        return view('admin.edit_category')->with('category', $category);
    }

    public function updatecategory(Request $request){
        $category = Category::find($request->input('id'));

        $oldcat = $category->ten_danhmuc;

        $category->ten_danhmuc = $request->input('ten_danhmuc');

        $data = array();
        $data ['ten_danhmuc'] = $request->input('ten_danhmuc');

        DB::table('products')->where('ten_danhmuc', $oldcat)->update($data);

        $category->update();

        return redirect('/category')->with('status', 'Cap nhat danh muc '.$category->ten_danhmuc.' thanh cong !');
    }

    //xoa danh muc
    public function delete($id){
        $category = Category::find($id);

        $category->delete();

        return redirect('/category')->with('status', 'Xoa danh muc '.$category->ten_danhmuc.' thanh cong !');

    }

    public function view_by_cat($name){
        $category = Category::get();
        $product = Product::where('ten_danhmuc', $name)->get();

        return view('client.shop')->with('product', $product)->with('category', $category);

    }


}
