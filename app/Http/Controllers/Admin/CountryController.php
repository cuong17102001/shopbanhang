<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Country;
use App\Http\Requests\AddCountryRequest;

class CountryController extends Controller
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
    public function country_view()
    {
        $useId = Auth::id();
        $profile = User::find($useId);

        $country = Country::all();
        return view('admin.country.country', compact('profile', 'country'));
    }
    public function add_country()
    {
        $useId = Auth::id();
        $profile = User::find($useId);

        // $country = Country::all();
        return view('admin.country.addcountry', compact('profile'));
    }
    public function add_country_form(AddCountryRequest $request)
    {
        $country = new Country;
        $country->country = $request->country;
        $country->save();

        return redirect('admin/country')->with('succsess','add country succsess');
    }
    public function delete($id)
    {
        $user = User::where('idCountry', $id)->count();
        if ($user > 0) {
            return redirect()->back()->with('error','user are using, cannot be deleted');
        }else{
            Country::find($id)->delete();
            return redirect()->back()->with('succsess','detele succsess');
        }

        
    }
}
