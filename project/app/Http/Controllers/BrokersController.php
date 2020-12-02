<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Http\Requests\BrokerRequest;


class BrokersController extends Controller
{

    public function index()
    {

         $data = User::where(['is_admin'=>'2','user_id'=>auth()->user()->id])->get()->toArray();
          return view('brokers.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('brokers.add');
    }


    public function store(BrokerRequest $request)
    {

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
        $broker = User::findOrFail($id);
        $broker->delete();
        return redirect('brokers')->with('success', 'Broker Deleted Successfully.');
    }
}
