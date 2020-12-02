@extends('layouts.admin')

 
@section('content')

 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('notes') }}">Notes</a></li>
                        <li class="breadcrumb-item active">Add Note</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>

 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        @if (Session::has('success'))
                           <div class="alert alert-success" role="alert">
                               {{Session::get('success')}}
                           </div>
                        @elseif (Session::has('error'))
                           <div class="alert alert-danger" role="alert">
                               {{Session::get('error')}}
                           </div>
                        @endif
                        
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Note</h4>
                            </div>

                            <div class="card-body">
                               

                    
                          <form action="{{route('notes.store')}}" method="post">
                          	@csrf
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <label class="control-label">Lead Name</label>
                                                    <h6 class="card-subtitle">{{$data['lead_name']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label class="control-label">Email</label>
                                                     <h6 class="card-subtitle">{{$data['email']}}</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <label class="control-label">Phone No</label>
                                                    <h6 class="card-subtitle">{{$data['phone_no']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label class="control-label">Source</label>
                                                     <h6 class="card-subtitle">{{$data['source']['source_name']}}</h6>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <h6 class="card-subtitle">{{$data['created_at']}}</h6>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder Date</label>
                                                    <!--<input type="date" class="form-control" placeholder="Reminder Date" name="reminder_date" value="{{ old('reminder_date') }}">-->

                                                      <input type="text" class="form-control" placeholder="Reminder Date" name="reminder_date" value="{{ old('reminder_date') }}" id="min-date">

                                                    @if($errors->has('reminder_date'))
                                                        <div class="alert alert-danger">{{ $errors->first('reminder_date') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder For</label>
                                                    <input type="text" class="form-control" placeholder="Reminder For" name="reminder_for" value="{{ old('reminder_for') }}">
                                                    @if($errors->has('reminder_for'))
                                                        <div class="alert alert-danger">{{ $errors->first('reminder_for') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row p-t-20">
                                          
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Feedback</label>
                                                    <input type="hidden" class="form-control" name="lead_id" placeholder="Lead Id" value="{{$data['id']}}">
                                                    <textarea type="text" class="form-control" name="feedback" placeholder="Enter Feedback" >{{ old('feedback') }}</textarea>
                                                    @if($errors->has('feedback'))
                                                        <div class="alert alert-danger">{{ $errors->first('feedback') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                     
                               
                                   
                                  <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                         <input type="reset" class="btn btn-inverse" value="Cancel" />
                                            <a href="{{ url('notes') }}"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>

                                    </form>     
                                        
                                    </div>
                                   
                      
                    
                          
                                
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
@endsection

