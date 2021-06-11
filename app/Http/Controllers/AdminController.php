<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function addcategory(){
        return view('admin.add_category');
    }
    
    public function category(){
        return view('admin.category');
    }

    public function order(){
        return view('admin.order');
    }
    


}
