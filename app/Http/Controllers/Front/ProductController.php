<?php

namespace App\Http\Controllers\Front;

use App\Admin\Product;
use App\Admin\Brand;
use App\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function slider(Request $request){
        // $brand = Brand::all();
        // $category = Category::all();
        // $p = Product::query();
        // $product = $p->where('price','>=',$request->slider)->get();
        // var_dump($product->name); 
        // return view('front.product.product',compact('product','brand','category'));
        echo $request->slider;
    }
    public function search_advanced(Request $request){
        $brand = Brand::all();
        $category = Category::all();
        $p = Product::query();

        if (!empty($request->name)) {
            $product = $p->where('name','like',$request->name)->get();
        }
        if (!empty($request->category)) {
            $product = $p->where('categoryId','like',$request->category)->get();
        }
        if (!empty($request->brand)) {
            $product = $p->where('brandId','like',$request->brand)->get();
        }
        if (!empty($request->price)) {
            if ($request->price == 1) {
                $product = $p->where('price','<=',20)->get();
            }
            if ($request->price == 2) {
                $product = $p->where('price','>=',20)->where('price','<=',40)->get();
            }
            if ($request->price == 3) {
                $product = $p->where('price','<=',40)->where('price','<=',100)->get();
            }
            if ($request->price == 4) {
                $product = $p->where('price','>=',100)->get();
            }
            
        }
        return view('front.product.product',compact('product','brand','category'));
    }
    public function product(){
        $product = Product::all();
        $brand = Brand::all();
        $category = Category::all();
        return view('front.product.product',compact('product','brand','category'));
    }
    public function search(Request $request){
        if ($request->search == '') {
            $product = Product::all();
        }else{
            $product = Product::where('name', 'like', '%' . $request->search . '%')->get();
            
        }
        return view('front.product.product',compact('product'));
        
    }
    public function myproduct(){
        $product = Product::where('userId',Auth::id())->get();
        return view('front.product.myproduct',compact('product'));
    }
    public function addproduct(){
        $category = Category::all();
        $brand = Brand::all();
        return view('front.product.addproduct',compact('category','brand'));
    }
    public function addproduct_form(AddProductRequest $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->brandId = $request->brandId;
        $product->sale = $request->sale;
        $product->description = $request->description;
        $product->userId = Auth::id();
        $data = [];
        if ($request->discount =='') {
            $product->discount = 0;
        }else{
            $product->discount = $request->discount;
        }
        
        // echo $request->discount;
        
        $dir = "upload/product/". Auth::id();
        if(!file_exists($dir)){
            // Tạo một thư mục mới
            mkdir($dir);
        }
        if($request->hasfile('image') && count($request->file('image')) <=3)
        {
            $random = rand();
            foreach($request->file('image') as $image)
            {

                $name = $random.$image->getClientOriginalName();
                $name_2 = "image_85_".$random.$image->getClientOriginalName();
                $name_3 = "image_330_".$random.$image->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                $path = public_path('upload/product/'. Auth::id(). "/" . $name);
                $path2 = public_path('upload/product/'. Auth::id(). "/" . $name_2);
                $path3 = public_path('upload/product/'. Auth::id(). "/" . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 85)->save($path2);
                Image::make($image->getRealPath())->resize(330, 380)->save($path3);
                
                $data[] = $name;
            }
        }
        else
        {
            return redirect()->back()->with('error','Only 3 files can be uploaded');
        }
        $product->image=json_encode($data);

        $product->save();

        return redirect('account/myproduct')->with('succsess','add product successfully');
    }
    public function editproduct($id){
        $product = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        return view('front.product.editproduct',compact('product','brand','category'));
    }
    public function editproduct_form(EditProductRequest $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->brandId = $request->brandId;
        $product->sale = $request->sale;
        $product->description = $request->description;
        $product->userId = Auth::id();
        $product->discount = $request->discount;

        $data = [];
        $edit_image = [];
        
        if (isset($request->image_value)) {
            foreach ($request->image_value as $key => $value) {
                $edit_image[] = $value; 
            }

        }
        $image = json_decode($product->image);
        $image = \array_diff($image, $edit_image);
        
        if (count($image) > 0) {
            $dir = "upload/product/". Auth::id();
            foreach ($edit_image as $edit) {
                if (file_exists( $dir."/".$edit)){
                    File::delete($dir."/".$edit);
                    File::delete($dir."/image_85_".$edit);
                    File::delete($dir."/image_330_".$edit);
                }
            }

            if($request->hasfile('image')){
            // var_dump($edit_image);
                $random = rand();
                foreach($request->file('image') as $img){
                    $image[] = $random.$img->getClientOriginalName(); 
                }

                var_dump($image);
                if (count($image) <= 3) {

                    foreach($request->file('image') as $img)
                    {

                        $name = $random.$img->getClientOriginalName();
                        $name_2 = "image_85_".$random.$img->getClientOriginalName();
                        $name_3 = "image_330_".$random.$img->getClientOriginalName();

                //$image->move('upload/product/', $name);

                        $path = public_path('upload/product/'. Auth::id(). "/" . $name);
                        $path2 = public_path('upload/product/'. Auth::id(). "/" . $name_2);
                        $path3 = public_path('upload/product/'. Auth::id(). "/" . $name_3);

                        Image::make($img->getRealPath())->save($path);
                        Image::make($img->getRealPath())->resize(85, 85)->save($path2);
                        Image::make($img->getRealPath())->resize(330, 380)->save($path3);
                    }
                    foreach ($image as $value) {
                        $data[] = $value;
                    }
                    $product->image = json_encode($data);

                    if ($product->update()) {
                         return redirect('account/myproduct')->with('succsess','edit product successfully');
                    }
                }else{
                    return redirect()->back()->with('error','Only 3 files can be uploaded');
                }
            }else{
                foreach ($image as $value) {
                    $data[] = $value;
                }
                $product->image = json_encode($data);
               if ($product->update()) {
                         return redirect('account/myproduct')->with('succsess','edit product successfully');
                }
            }
        }else{
            return redirect()->back()->with('error','must contain at least 1 image');
        }
        
    }
   public function delete_pro(Request $request){
        $product = Product::find($request->id);
        $image = json_decode($product->image);
        $dir = "upload/product/". $product->userId;
        echo '<pre>';
        var_dump($image);
        echo '</pre>';
        foreach ($image as $delete) {
            if (file_exists( $dir."/".$delete)){
                File::delete($dir."/".$delete);
                File::delete($dir."/image_85_".$delete);
                File::delete($dir."/image_330_".$delete);
            }
        }
        $product->delete();
   }

}
