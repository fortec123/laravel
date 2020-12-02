<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lead;
use App\Models\Source;
use App\Models\Note;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function analysis()
    {
        $record = Source::where(['user_id'=>auth()->user()->id])->with('total_leads')
        ->with('unassigned_leads')
        ->with('pending_leads')
        ->with('closed_leads')
        ->with('failed_leads')
        ->with('amount_invested')
        //->with('amount_genrated')
        ->with('amount_received')
        ->orderBy('id')
        ->get()->toArray();
        //dd($record);
        $data = [];
        foreach($record as $record){
          
            $total_amount = 0;
            foreach ($record['amount_invested'] as $item) {
                $total_amount += $item['amount'];
            }

            $amount_received = 0;
            foreach ($record['amount_received'] as $items) {
                foreach ($items['amount_received'] as $itemss) {
                    $amount_received += $itemss['amount'];
                }
            }

            //$data1['id']=$record['id'];
            $data1['source_name']=$record['source_name'];
            $data1['total_leads']= count($record['total_leads']);
            $data1['unassigned_leads']= count($record['unassigned_leads']);
            $data1['pending_leads']= count($record['pending_leads']);
            $data1['closed_leads']= count($record['closed_leads']);
            $data1['failed_leads']= count($record['failed_leads']);
            $data1['total_amount']=$total_amount;
            $data1['amount_genrated']=$total_amount;
            $data1['amount_received']=$amount_received;



             $data[] = $data1;

        }

        //dd($data);
         return view('analysis')->with(['data'=>$data]);
        
    }


    public function performance()
    {
         return view('performance');
    }


    public function index()
    {

        //print_R(auth()->user());die;
        
            
        if(auth()->user()->is_admin == 1){

            $totalLeads = Lead::count();
            $totalPendingLeads = Lead::where(['asign_to'=>auth()->user()->id, 'status'=>'1'])->count();
            $totalClosedLeads = Lead::where(['asign_to'=>auth()->user()->id, 'status'=>'3'])->count();
            $totalFailedLeads = Lead::where(['asign_to'=>auth()->user()->id, 'status'=>'2'])->count();

            $today = date('Y-m-d');
            
            $todayReminders = Note::where(['reminder_date'=>$today])->count(); 

           
            return view('employeeDashboard')->with(['totalPendingLeads'=>$totalPendingLeads, 'totalClosedLeads'=>$totalClosedLeads, 'totalFailedLeads'=>$totalFailedLeads, 'todayReminders'=>$todayReminders]);


        }elseif(auth()->user()->is_admin == 2){

            $totalLeads = Lead::where(['user_id'=>auth()->user()->id])->count();
            $totalPendingLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'1'])->count();
            $totalClosedLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'3'])->count();
            $totalFailedLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'2'])->count();


            return view('adminDashboard')->with(['totalPendingLeads'=>$totalPendingLeads, 'totalClosedLeads'=>$totalClosedLeads, 'totalFailedLeads'=>$totalFailedLeads, 'totalLeads'=>$totalLeads]);

        }else{

           /* $totalLeads = Lead::count();
            $totalPendingLeads = Lead::where(['status'=>'1'])->count();
            $totalClosedLeads = Lead::where(['status'=>'3'])->count();
            $totalFailedLeads = Lead::where(['status'=>'2'])->count();


            return view('adminDashboard')->with(['totalPendingLeads'=>$totalPendingLeads, 'totalClosedLeads'=>$totalClosedLeads, 'totalFailedLeads'=>$totalFailedLeads, 'totalLeads'=>$totalLeads]);*/

            $totalLeads = Lead::where(['user_id'=>auth()->user()->id])->count();
            $totalPendingLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'1'])->count();
            $totalClosedLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'3'])->count();
            $totalFailedLeads = Lead::where(['user_id'=>auth()->user()->id, 'status'=>'2'])->count();


            return view('adminDashboard')->with(['totalPendingLeads'=>$totalPendingLeads, 'totalClosedLeads'=>$totalClosedLeads, 'totalFailedLeads'=>$totalFailedLeads, 'totalLeads'=>$totalLeads]);

        }
    }
}
