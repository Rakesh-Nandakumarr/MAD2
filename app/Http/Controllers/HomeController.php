<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\product;

class HomeController extends Controller{
    public function redirect(){
        return view("welcome");
    }
}