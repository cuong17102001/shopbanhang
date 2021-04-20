<?php

namespace App\Http\Controllers\Front;
use App\Admin\CateBlog;
use App\User;
use App\Admin\Blog;
use App\Admin\CommentBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
	public function index(){
		$blog = Blog::orderBy('id', 'desc')->paginate(3);
        // $blog = Blog::orderBy('id', 'desc')->get();
		return view('front.blog.blog', compact('blog'));
	}
	public function detail($id){
		$auth_user = User::find(Auth::id());
		$blog = Blog::find($id);
		$cate = CateBlog::where('blogId',$id)->get();
		$cmt_con = CommentBlog::where('blogId',$id)->orderBy('id', 'desc')->get();
		$cmt_cha = CommentBlog::where('blogId',$id)->where('level',0)->orderBy('id', 'desc')->get();
		$user = User::all();
		return view('front.blog.blogdetail',compact('blog','cate','cmt_cha','cmt_con','user','auth_user'));
	}
	public function rate(Request $request,$id){

		// $check = CateBlog::where('blogId',$id)->where('userId',Auth::id())->get();

		// var_dump( $check->blogId);exit;
		// if ($check->count() > 0) {
		// 	CateBlog::find(['blogId' => $id, 'userId' => Auth::id()])->update(['rate'=>$request->value]);
		// }else{
			$rate = new CateBlog;
			$rate->blogId = $id;
			$rate->userId = Auth::id();
			$rate->rate = $request->value;
    	// echo $id." ".Auth::id()." ".$request->value;
			$rate->save();
		// }
	}
	public function cmt(Request $request,$id){
		$cmt = new CommentBlog;
		$cmt->userId = Auth::id();
		$cmt->blogId = $id;
		$cmt->content = $request->content;
		$cmt->level = 0;
		$cmt->save();
	}
	public function replay_cmt(Request $request, $id){
		$cmt = new CommentBlog;
		$cmt->userId = Auth::id();
		$cmt->blogId = $id;
		$cmt->content = $request->content;
		$cmt->level = $request->level;
		$cmt->save();
	}
}
