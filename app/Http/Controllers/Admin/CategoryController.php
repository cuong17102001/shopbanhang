<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin\Category;
class CategoryController extends Controller
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
    public function category_view(){
    	$useId = Auth::id();
        $profile = User::find($useId);
        $category = Category::all();
    	return view('admin.category.category',compact('profile','category'));
    }
    public function add_category_view(){
    	$useId = Auth::id();
        $profile = User::find($useId);
    	return view('admin.category.addcategory',compact('profile'));
    }
    public function add_category_form(Request $request){
    	$category = new Category;
    	$category->category = $request->addcategory;
    	$category->save();
    	return redirect('admin/category')->with('succsess','add category successfully');
    }
    public function delete_category($id){
    	Category::where('id',$id)->delete();
    	return redirect()->back()->with('succsess','delete category successfully');
    }
}
