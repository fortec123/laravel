<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Source;

use App\Models\Money;

use App\Http\Requests\SourceRequest;

use Validator;


class SourcesController extends Controller
{

    public function index()
    {

        $data = Source::where(['user_id'=>auth()->user()->id])->select("*", \DB::raw('(SELECT SUM(amount) FROM money WHERE money.source_id = sources.id) as amount'))->get()->toArray();
         return view('sources.list')->with(['data'=>$data]);
    }


    public function create()
    {
         return view('sources.add');
    }


    public function store(Request $request)
    {
        /*$data = array(
            'source_name'=>$request->source_name
        );
        
        Source::create($data);
        
        return redirect('sources')->with('success', 'Source Added Successfully.');*/


        $validator = Validator::make($request->all(), [
            'source_name' => 'required|min:3|max:20',
        ]);


        if ($validator->passes()) {


            $data = array(
                'user_id'=>auth()->user()->id,
                'source_name'=>$request->source_name
            );
            
            Source::create($data);

            return response()->json(['success'=>'Added new records.']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
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

        $source = Source::findOrFail($id);
        $source->delete();
        return redirect('sources')->with('success', 'Source Deleted Successfully.');
    }

    public function updateAmount(Request $request)
    {

        /*$validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);


        if ($validator->passes()) {

            $data = array(
                'status'=>$request->status
            );
            
             //Lead::where('id', $request->lead_id)->update(['status'=>$request->status]);
            return response()->json(['success'=>'Updated Successfully.']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);

        */

             $data = array(
                'source_id'=>$request->source_id,
                'amount'=>$request->amount,
                 'date'=>$request->date
            );
            
            //print_r($data); dd();
            Money::create($data);

            //Lead::where('source_id', $request->source_id)->update([]);
            return response()->json(['success'=>'Updated Successfully.']);
    }
}
