<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;

use App\Models\Currency;

use App\Http\Requests\CurrencyRequest;

use DB;

class CurrenciesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Currency::get()->toArray();
        //dd(json_encode($data));
        return view('currencies.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('currencies.add');
    }


    public function store(CurrencyRequest $request)
    {

         $data = array(
            'NumCode'=>$request->NumCode,
            'CharCode'=>$request->CharCode,
            'Nominal'=>$request->Nominal,
            'Name'=>$request->Name,
            'Value'=>$request->Value,

        );

        Currency::create($data);
        
        return redirect('currencies')->with('success', 'Currency Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
        

        $currencies = Currency::where(['id'=>$id])->first();
        return view('currencies.edit')->with(['currencies'=>$currencies]);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        $currency = Currency::find($id);

        $currency->NumCode = $input['NumCode'];
        $currency->CharCode = $input['CharCode'];
        $currency->Nominal = $input['Nominal'];
        $currency->Name = $input['Name'];
        $currency->Value = $input['Value'];
    

         $currency->save();

          return redirect('currencies')->with('success', 'Currency Updated Successfully.');
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $currency = Currency::findOrFail($id);
        //dd($id);
        $currency->delete();
        return redirect('currencies')->with('success', 'Currency Deleted Successfully.');
    }
}
