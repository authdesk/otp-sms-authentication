<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
           $user_profile = User::find(Auth::user()->id);
          
            return view('frontend.user.user_profile', compact('user_profile'));
            
        }
 
    }
    
}
