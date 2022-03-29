<?php

namespace App\Http\Controllers;

use App\Models\Setting;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
}
