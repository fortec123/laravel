<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Http\Requests\EmployeeRequest;


class EmployeesController extends Controller
{

    public function index()
    {

         $data = User::where(['is_admin'=>'1','user_id'=>auth()->user()->id])->get()->toArray();
          return view('employees.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('employees.add');
    }


    public function store(EmployeeRequest $request)
    {

        $password = rand(10000000,99999999);

         $data = array(
            'user_id'=>auth()->user()->id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'name'=>$request->first_name.' '.$request->last_name,
            'phone_no'=>$request->phone_no,
            'email'=>$request->email,
            'password'=>Hash::make($password),
            'orignal_password'=>$password,
            'address'=>$request->address,
            'is_admin'=>'1',
        );

        User::create($data);
        
        return redirect('employees')->with('success', 'Employee Added Successfully.');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect('employees')->with('success', 'Employee Deleted Successfully.');
    }
}
