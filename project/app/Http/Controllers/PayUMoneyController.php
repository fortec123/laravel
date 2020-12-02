<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Http\Requests\ProductRequest;


class PayUMoneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //  
    }


    public function SubscribProcess ()
    {
        return view('payumoney.payumoney');
    }


    public function SubscribeResponse (Request $request)
    {
        dd('Payment Successfully done!');
    }

    public function SubscribeCancel ()
    {
         dd('Payment Cancel!');
    }

    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
        //
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
        //
    }
}
