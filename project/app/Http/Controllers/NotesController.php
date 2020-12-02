<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Models\Lead;
use App\Models\Note;

use App\Http\Requests\NoteRequest;


class NotesController extends Controller
{
    
    public function index()
    {
        //print_R(auth()->user()->id);die;
         $data = Lead::with('source')->where(['status'=>'1','asign_to'=>auth()->user()->id])->get()->toArray();
         return view('notes.list')->with(['data'=>$data]);
    }

    
    public function create()
    {
        //
    }

    public function add($id)
    {
        $data =  Lead::where(['id'=>$id])->first();
        return view('notes.add')->with(['data'=>$data]);
    }

    
    public function store(NoteRequest $request)
    {
         $data = array(
            'user_id'=>auth()->user()->id,
            'lead_id'=>$request->lead_id,
            'reminder_date'=>$request->reminder_date,
            'reminder_for'=>$request->reminder_for,
            'feedback'=>$request->feedback,
        );

        Note::create($data);

        return Redirect::back()->with('success', 'Note Added Successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        //$data =  Lead::where(['id'=>$id])->with('note')->first()->toArray();
       //dd($data['note']);
        $data =  Note::where(['id'=>$id])->first()->toArray();

        return view('notes.edit')->with(['data'=>$data]);
    }

    
    public function update(NoteRequest $request, $id)
    {
         $data = array(
            'reminder_date'=>$request->reminder_date,
            'reminder_for'=>$request->reminder_for,
            'feedback'=>$request->feedback,
        );

         Note::where('id', $id)->update($data);

        return Redirect::back()->with('success', 'Note Updated Successfully.');
    }

    
    public function destroy($id)
    {
        //
    }

    public function view($id)
    {

        $data =  Lead::where(['id'=>$id])->with('source')->with('notes')->first();
        return view('notes.view')->with(['data'=>$data]);
    }
}
