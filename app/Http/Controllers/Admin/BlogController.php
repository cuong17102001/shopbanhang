<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\EditBlogRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
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
    public function blog_view(){
        $useId = Auth::id();
        $profile = User::find($useId);

        $blog = Blog::all();
        return view('admin.blog.blog',compact('profile','blog'));
    }
    public function blog_add(){
        $useId = Auth::id();
        $profile = User::find($useId);

        return view('admin.blog.addblog',compact('profile'));
    }
    public function blog_add_form(BlogRequest $request){
        $blog = new Blog;
        $file = $request->image;
        $blog['title'] = $request->title;
        $blog['image'] = $file->getClientOriginalName();
        $blog['description'] = $request->description;
        $blog['content'] = $request->content;
        if ($blog->save()) {
            $file->move('upload/admin',$file->getClientOriginalName());
            return redirect('admin/blog')->with('succsess','Add blog succsess');
        }else{
            return redirect()->back()->with('error','Add blog errors');
        }
    }
    public function edit_blog($id){
        $useId = Auth::id();
        $profile = User::find($useId);

        $blog = Blog::find($id);
        return view('admin.blog.editblog',compact('profile','blog'));
    }
    public function edit_blog_form($id,EditBlogRequest $request){
        
        $blog = Blog::findOrFail($id);
        $data = $request->all();
        $file = $request->image;
        $arr = [];
        $arr['title'] = $data['title'];
        $arr['description'] = $data['description'];
        $arr['content'] = $data['content'];
        if (!empty($file)) {
            $arr['image'] = $file->getClientOriginalName();
        }else{
            $arr['image'] = $blog->image;
        }
        if ($blog->update($arr)) {
            if (!empty($file)) {
                $file->move('upload/admin', $file->getClientOriginalName());
            }
            return redirect('admin/blog')->with('succsess','edit blog succsess');
        }else{
            return redirect()->back()->with('error','edit blog error');
        }
    }
}
