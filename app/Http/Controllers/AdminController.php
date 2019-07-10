<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use Auth;

class AdminController extends Controller
{
    
    public function dashboard(){
        $department = Department::all();
        $employee = Employee::all();
        return view('admin.index',compact('department','employee'));
    }

    public function logout(){

        Auth::logout();
        return redirect()->back()->with('success','Logout Successfull');
    }


}
