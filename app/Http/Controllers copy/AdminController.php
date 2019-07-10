<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function sidebar(){

        return view('admin.sidebar');
    }


}
