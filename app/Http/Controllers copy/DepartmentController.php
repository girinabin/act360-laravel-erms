<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use App\Department;

class DepartmentController extends Controller
{
    public function create(){
        $department = Department::all();
        return view('admin.department.create',compact('department'));
    }

    public function store(Request $request){
            // dd($request->all());
            
            $data = $request->all();
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
            ]);


            $depart = new Department;
            $depart->title = ucwords($data['title']);
            $depart->description = $data['description'];
            $depart->save();

            return redirect()->back()->with('success','Department added successfully');



    }
    public function update(Request $request, $id){
        $data = $request->all();

        $department = Department::find($id);
        $department->title = ucwords($data['title']);
        $department->description = $data['description'];
        $department->save();

        return redirect()->back()->with('success','Department updated successfully');

    }

    public function dep_status($id){

        $department = Department::find($id);
        if($department->status == 1){
            $department->status = 0;
        }else{
            $department->status = 1;
            
        }
        $department->save();
        return redirect()->back()->with('success','Department Status updated successfully');


    }

    public function delete($id){
        $department = Department::find($id);
        $department->delete();
        return redirect()->back()->with('success','Department deleted successfully');

    }
}
