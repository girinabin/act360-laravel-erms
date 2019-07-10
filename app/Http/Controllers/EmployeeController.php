<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use App\Employee;
use App\Department;

class EmployeeController extends Controller
{
    public function create(){
        $employee = Employee::all();
        $department = Department::all();
        return view('admin.Employee.create',compact('employee','department'));
    }

    public function store(Request $request){
            // dd($request->all());
            
            $data = $request->all();
            // $validatedData = $request->validate([
            //     'title' => 'required|max:255',
            //     'description' => 'required',
            // ]);


            $employee = new Employee;
            $employee->name = ucwords($data['name']);
            $employee->gender = $data['gender'];
            $employee->dob = $data['dob'];
            $employee->mobile_no = $data['mobile_no'];
            $employee->address = $data['address'];
            $employee->department_id = $data['department_id'];
            $employee->about = $data['about'];
            $employee->join_date = $data['join_date'];

            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = rand(888,8888).'.'.$extension;
                $file->move('uploads/employees/', $filename);
                $employee->image = 'uploads/employees/'.$filename;
            }
            $employee->save();

            return redirect()->back()->with('success','Employee added successfully');



    }

    public function update(Request $request, $id){
        $data = $request->all();

        $employee = Employee::find($id);
        $employee->name = ucwords($data['name']);
        $employee->gender = $data['gender'];
        $employee->dob = $data['dob'];
        $employee->mobile_no = $data['mobile_no'];
        $employee->address = $data['address'];
        $employee->department_id = $data['department_id'];
        $employee->about = $data['about'];
        $employee->join_date = $data['join_date'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(888,8888).'.'.$extension;
            $file->move('uploads/employees/', $filename);
            $employee->image = 'uploads/employees/'.$filename;
        }
        $employee->save();

        return redirect()->back()->with('success','Employee updated successfully');

    }

    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('success','Employee deleted successfully');

    }
}
