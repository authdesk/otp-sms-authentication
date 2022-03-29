<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.auth.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'user_type' => ['required'],
            'phone' => ['required', 'unique:users' ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $image=$request->file('avatar');

        if ($image) {
            //image url set
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/frontend_image/avatar/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            $user = User::create([
                'name' => $request->name,
                'user_type' => $request->user_type,
                'phone' => $request->phone,
                'avatar' => $image_url,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'referral' => $request->referral,
                'status' => $request->status,
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'user_type' => $request->user_type,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'referral' => $request->referral,
                'status' => $request->status,
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
