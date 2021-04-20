<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin\Brand;
class BrandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function brand_view(){
    	$useId = Auth::id();
        $profile = User::find($useId);
        $brand = Brand::all();
    	return view('admin.brand.brand',compact('profile','brand'));
    }
    public function add_brand_view(){
    	$useId = Auth::id();
        $profile = User::find($useId);
    	return view('admin.brand.addbrand',compact('profile'));
    }
    public function add_brand_form(Request $request){
    	$brand = new Brand;
    	$brand->brand = $request->addbrand;
    	$brand->save();
    	return redirect('admin/brand')->with('succsess','add brand successfully');
    }
    public function delete_brand($id){
    	Brand::where('id',$id)->delete();
    	return redirect()->back()->with('succsess','delete brand successfully');
    }
}
