<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Models\Lead;
use App\Models\Note;

use App\Http\Requests\NoteRequest;

class ReminderController extends Controller
{
    public function view()
    {

        $today = date('Y-m-d');
		$data =  Note::where(['reminder_date'=>$today])->with('lead')->get()->toarray(); 
		//print_r($data); die();
        return view('reminder.view')->with(['data'=>$data]);
    }
}
