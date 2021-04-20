<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function view_profile(){
        $useId = Auth::id();
        $profile = User::find($useId);
        $country = Country::all();
        return view('admin.user.profile',compact('profile','country'));
    }
    public function update_profile(UpdateUserRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $arr = [];
        $data = $request->all();
        $file = $request->avatar;
        $arr['name'] = $request->name;
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
            return redirect()->back()->withErrors('update profile errors');
        }
    }
}
