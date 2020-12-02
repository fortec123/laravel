<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Http\Requests\EmployeeRequest;


class ApisController extends Controller
{

     public function register(Request $request)
    {
dd($request);
        $password = rand(10000000,99999999);

         $data = array(
            'user_id'=>auth()->user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_no'=>$request->phone_no,
            'password'=>Hash::make($password),
            'orignal_password'=>$password,
            'is_admin'=>'2',
        );

        User::create($data);
        
        return redirect('brokers')->with('success', 'Broker Added Successfully.');
    }

   
}
