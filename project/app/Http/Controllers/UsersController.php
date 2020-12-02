<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Http\Requests\UserRequest;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

         $data = User::where(['is_admin'=>'2'])->get()->toArray();
          return view('users.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('users.add');
    }


    public function store(UserRequest $request)
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
        
        return redirect('users')->with('success', 'User Added Successfully.');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users')->with('success', 'User Deleted Successfully.');
    }
}
