<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lead;
use App\Models\Source;
use App\Models\User;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\SearchLeadRequest;
use App\Http\Requests\AssignLeadRequest;


class LeadsController extends Controller
{

    public function index()
    {

        if (!isset($_GET['status'])) {

            $data = Lead::where(['user_id'=>auth()->user()->id])->with('source')->with('feedback')->get()->toArray();
       } else{
            $data = Lead::where(['user_id'=>auth()->user()->id,'status'=>$_GET['status']])->with('source')->with('feedback')->get()->toArray();
       }

         //$data = Lead::with('source')->with('feedback')->get()->toArray();
         $sources = Source::where(['user_id'=>auth()->user()->id])->select('id','source_name')->get()->toArray();
         return view('leads.list')->with(['data'=>$data,'sources'=>$sources]);
    }

  
    public function create()
    {
        $sources = Source::where(['user_id'=>auth()->user()->id])->select('id','source_name')->get()->toArray();
        return view('leads.add')->with(['sources'=>$sources]);
    }


    public function store(LeadRequest $request)
    {
        
        $data = array(
            'user_id'=>auth()->user()->id,
            'phone_no'=>$request->phone_no,
            'lead_name'=>$request->lead_name,
            'email'=>$request->email,
            'lead_details'=>$request->lead_details,
            'source_id'=>$request->source_id,
        );
        
        lead::create($data);
        
        return redirect('leads')->with('success', 'Lead Added Successfully.');
    }

  
    public function show($id)
    {
        $data = Lead::where(['id'=>$id])->with('source')->with('user')->first()->toArray();
        //dd($data);
        return view('leads.show')->with(['data'=>$data]);
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
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect('leads')->with('success', 'Lead Deleted Successfully.');
    }

    public function searchLead(SearchLeadRequest $request)
    {

        if($request->has('source_id') && !empty($request->input('source_id'))) {
            $data = Lead::where('source_id', $request->source_id)->with('source')->get()->toArray();
        } else {
            $data = Lead::with('source')->get()->toArray();
        }

         $sources = Source::select('id','source_name')->get()->toArray();
         return view('leads.list')->with(['data'=>$data,'sources'=>$sources]);
    }


    public function view()
    {

           
        $data = Lead::where(['user_id'=>auth()->user()->id])->with('source')->get()->toArray();
        $employees = User::where(['user_id'=>auth()->user()->id, 'is_admin'=>'1'])->get()->toArray();
        return view('leads.view')->with(['employees'=>$employees,'data'=>$data]);
    }


    public function views(Request $request)
    {

        if($request->has('employee_id') && !empty($request->input('employee_id'))) {
            $data = Lead::where(['user_id'=>auth()->user()->id,'asign_to'=>$request->employee_id])->with('source')->get()->toArray();
        } else {
            $data = Lead::with('source')->get()->toArray();
        }

        $employees = User::where(['user_id'=>auth()->user()->id, 'is_admin'=>'1'])->get()->toArray();

         return view('leads.view')->with(['employees'=>$employees,'data'=>$data]);
    }


    public function assign()
    {   
        $data = Lead::with('source')->where(['user_id'=>auth()->user()->id,'status'=>'1','asign_to'=>NULL])->get()->toArray();
        $employees = User::where(['user_id'=>auth()->user()->id,'is_admin'=>'1'])->get()->toArray();
        return view('leads.assign')->with(['employees'=>$employees,'data'=>$data]);
    }

    public function assigns(Request $request)
    {

        /*if($request->has('employee_id') && !empty($request->input('employee_id'))) {
            $data = Lead::where('asign_to', $request->employee_id)->with('source')->get()->toArray();
        } else {
            $data = Lead::with('source')->get()->toArray();
        }*/
        $data = Lead::with('source')->where(['status'=>'1'])->get()->toArray();
        $employees = User::where(['is_admin'=>'1'])->get()->toArray();

         return view('leads.assign')->with(['employees'=>$employees,'data'=>$data]);
    }

    public function closed()
    {
         $data = Lead::with('source')->where(['asign_to'=>auth()->user()->id])->with('feedback')->where(['status'=>'3'])->get()->toArray();
         //dd($data);
         return view('leads.closed')->with(['data'=>$data]);
    }


    public function failed()
    {
         $data = Lead::with('source')->where(['asign_to'=>auth()->user()->id])->with('feedback')->where(['status'=>'2'])->get()->toArray();
         return view('leads.failed')->with(['data'=>$data]);
    }


    public function changeStatus(Request $request)
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
            Lead::where('id', $request->lead_id)->update(['status'=>$request->status]);
            return response()->json(['success'=>'Updated Successfully.']);
    }

    public function assignLeadsEmployee(AssignLeadRequest $request)
    {

            $data = array(
                'employee_id'=>$request->employee_id,
                'lead_id'=>$request->lead_id
            );
            
            foreach($request->lead_id as $leadid) {
            Lead::where('id', $leadid)->update(['asign_to'=>$request->employee_id]);
            }

            return redirect('leads/assign')->with('success', 'Leads Assigned Successfully.');
            
    }

    public function getLeads(Request $request)
    {

        $data = Lead::where('asign_to', $request->employee_id)->get()->toArray();
        return response()->json($data);
    }

 

}
