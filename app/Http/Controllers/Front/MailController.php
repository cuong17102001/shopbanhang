<?php

namespace App\Http\Controllers\Front;

use App\Admin\History;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function pay(Request $request)
    {

        if (Auth::check()) {
            $user = User::find(Auth::id());
            $data = [];
            $data['name'] = $user->name;
            $data['phone'] = $user->phone;
            $data['email'] = $user->email;
            $data['userId'] = Auth::id();
            $data['price'] = $request->price;

            $his = new History();
            $his->name = $user->name;
            $his->phone = $user->phone;
            $his->email = $user->email;
            $his->userId = Auth::id();
            $his->price = $request->price;
            $his->save();


            $to_name = "shipping bill";
            $to_email = $user->email; //send to this email
            Mail::send('front.mail.bill', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('test mail nhé'); //send this mail with subject
                $message->from($to_email, $to_name); //send from this mail
            });

            return redirect()->back()->with('succsess','mua hàng thành công');
        }else{
            return redirect()->back()->with('error','bạn phải đăng nhập');
        }
    }
}
