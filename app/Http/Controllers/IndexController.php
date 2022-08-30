<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        return view('frontend.pages.home');
    }

    public function registerWarranty(){
        return view('frontend.pages.registerwarranty');
    }

    public function checkWarranty(){
        return view('frontend.pages.checkwarranty');
    }
}
