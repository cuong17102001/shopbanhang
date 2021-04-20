<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Admin\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class AccountController extends Controller
{
    public function register_ajax(Request $request){

        $check = User::where('email',$request->email);

        if ($check->count() > 0) {
            echo 0;
        }else{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->avatar = 'default.jpg';
            $user->level = 0;
            $user->save();
            echo 1;
        }

        
        
    }
    public function login_ajax(Request $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        if (Auth::attempt($login)) {
            echo '1';
        }else{
            echo '0';
        }
        
    }
    public function login(){
        return view('front.account.login');
    }
    public function register(){
        return view('front.account.register');
    }
    public function register_form(RegisterRequest $request){
        

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->avatar = 'default.jpg';
        $user->level = 0;
        $user->save();

        return redirect('/member-login')->with('succsess','Register succsess');  

    }
    public function login_form(LoginRequest $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        
        $remember = false;

        if ($request->remember) {
            $remember = true;
        }
        if (Auth::attempt($login,$remember)) {
            return redirect('/');
        }else{
            return redirect()->back()->with('error','wrong email or password');
        }
    }
   public function profile(){
        $user = User::find(Auth::id());
        $country = Country::all();
        return view('front.account.profile',compact('user','country'));
   }
   public function update_profile(UpdateUserRequest $request){
        $user = User::findOrFail(Auth::id());
        $arr = [];
        $data = $request->all();
        $file = $request->avatar;
        $arr['idCountry'] = $data['country'];
        $arr['phone'] = $request->phone;
        $arr['address'] = $request->address;
        if (!empty($file)) {
            $arr['avatar'] = $file->getClientOriginalName();
        }
        if ($data['password'] != NULL) {
            $arr['password'] = bcrypt($data['password']);
        } else {
            $arr['password'] = $user->password;
        }
        if ($user->update($arr)) {
            if (!empty($file)) {
                $file->move('upload/admin', $file->getClientOriginalName());
            }
            return redirect()->back()->with('succsess',__('update profile succsess'));
        } else {
            return redirect()->back()->with('error','update profile errors');
        }
   }
}
