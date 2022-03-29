<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class OTPController extends Controller
{
    public function login_by_phone_number()
    {
        return view('frontend.auth.login_by_phone_number');
    }

    public function login_phone_number_check($number)
    {

        
       $user = User::Where('phone', $number)->first();


        if (isset($user)) {
            
            $response = [
                'user' => $user

            ];

            return response($response);

            
        } else {
            $response = [
                'error' => "Invalid login credential! Phone Number not found!"

            ];

            return response($response);
        }
    }


    
    public function login_phone_number_create_auth($phone)
    {
        

        $user = User::Where('phone', $phone)->first();


        //if user login successfully
        if ($user) {

            Auth::login($user);
        
            $response = [
                'status' => "success",
                'message' => "User Loged In!",
                'route' => "dashboard"

            ];

            return response($response);
                   
        }

        else {

            //else user doesn't match

            $response = [
                'status' => "error",
                'message' => "Error! Phone Number does not match!",
                'route' => "login"
    
            ];
    
            return response($response);
        }

    }

}
