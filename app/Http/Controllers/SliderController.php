<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderController extends Controller
{
    //
    
    public function addslider(){
        return view('admin.add_slider');
    }
    public function slider(){
        $slider = Slider::get();

        return view('admin.slider')->with('slider', $slider);
    }

    public function saveslider(Request $request){
        $this->validate($request, ['mota1' => 'required',
                                    'mota2' => 'required',
                                    'anh_sl' => 'image|nullable|max:1999']);
    
        if($request->hasFile('anh_sl')){
            //1: get filename with ext
            $fileNameWithExt = $request->file('anh_sl')->getClientOriginalName();

            //2: get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just extension
            $extension = $request->file('anh_sl')->getClientOriginalExtension();

            //4: filename to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload img
            $path = $request->file('anh_sl')->storeAs('public/anh_sl', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        $slider = new Slider();

        $slider->mota1 = $request->input('mota1');
        $slider->mota2 = $request->input('mota2');
        $slider->anh_sl = $fileNameToStore;
        $slider->trangthai_sl = 1;

        $slider->save();

        return redirect('/addslider')->with('status', 'Them Slider thanh cong !');

    }
    public function editslider($id){

        $slider = Slider::find($id);

        return view('admin.edit_slider')->with('slider', $slider);
    }
    public function updateslider(Request $request){
     
        $this->validate($request, ['mota1' => 'required',
                                    'mota2' => 'required',
                                    'anh_sl' => 'image|nullable|max:1999']);

        $slider = Slider::find($request->input('id'));

        $slider->mota1 = $request->input('mota1');
        $slider->mota2 = $request->input('mota2');

        if($request->hasFile('anh_sl')){

            //1: get filename with ext
            $fileNameWithExt = $request->file('anh_sl')->getClientOriginalName();
    
            //2: get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just extension
            $extension = $request->file('anh_sl')->getClientOriginalExtension();

            //4: filename to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload img
            $path = $request->file('anh_sl')->storeAs('public/anh_sl', $fileNameToStore);

            $old_image = Slider::find($request->input('id'));

            if($old_image->anh_sl != 'noimgage.jpg'){
                Storage::delete('public/anh_sl/'.$old_image->anh_sl);
            }
            $slider->anh_sl = $fileNameToStore;
        
        }

        $slider->update();
        return redirect('/slider')->with('status', 'Cap nhat Slider thanh cong !');

    }

    public function deleteslider($id){
        $slider = Slider::find($id);

        $slider->delete();

        return redirect('/slider')->with('status', 'Xoa Slider thanh cong !');
    }

    public function activateslider($id){
        $slider = Slider::find($id);

        $slider->trangthai_sl = 1;
        $slider->update();

        return redirect('/slider')->with('status', 'Trang thai Slider cap nhat thanh cong !');

    }

    public function unactivateslider($id){
        $slider = Slider::find($id);

        $slider->trangthai_sl = 0;
        $slider->update();

        return redirect('/slider')->with('status', 'Trang thai Slider cap nhat thanh cong !');

    }

}
