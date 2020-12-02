@extends('layouts.admin')

 
@section('content')


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
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
                                <h4 class="m-b-0 text-white">Leads</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                                 <a type="button" href="{{ route('leads.create') }}" class="btn btn-success addButton"> + Add Lead</a>
                                 
                                    <form class="form-horizontal form-label-left input_mask" id="assignForm" method='post' action="{{ route('searchLead') }}">
                                            @csrf
                                            <div class="mian-dp">

                                        <div class="main-first">
                                                    <select class="form-control"  name="source_id" id="source_id">
                                                        <option value="">Select Source</option>
                                                        @foreach($sources as $sources)
                                                            @if (old('source_id') == $sources['id'])
                                                                <option value="{{ $sources['id'] }}" selected>{{ $sources['source_name'] }}</option>
                                                            @else
                                                                <option value="{{ $sources['id'] }}">{{ $sources['source_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('source_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('source_id') }}</div>
                                                    @endif
                                                </div>

                                

                                        <div class="main-second">
                                                <button type="submit" id="submitButton" class="btn btn-success">Search</button>
                                                </div>
                                                
                                            </div>

                                        </form>


                               
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Lead Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Date</th>
                                                <th>Source</th>
                                                <th>Lead Details</th>
                                                <th>Feedback</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $data)
                                            <tr>
                                                <td>{{ $data['id'] }}</td>
                                                <td>{{ $data['lead_name'] }}</td>
                                                <td>{{ $data['email'] }}</td>
                                                <td>{{ $data['phone_no'] }}</td>
                                                <td>{{ $data['created_at'] }}</td>
                                                <td>{{ $data['source']['source_name'] }}</td>
                                                <td>{{ $data['lead_details'] }}</td>
                                                <td>{{ $data['feedback']['feedback'] }}</td>

                                                @if($data['status'] == 1)
                                                    <td><span class="label label-warning">Pending</span></td>
                                                @elseif($data['status'] == 2)
                                                    <td><span class="label label-danger">Failed</span></td>
                                                @else
                                                    <td><span class="label label-success">Closed</span></td>
                                                @endif


                                                <td><!--<a href="{{ url('/feedbacks/add', [$data['id']]) }}"><span class="label label-info">Add Feedback</span></a>--->

                                                 <a href="{{ url('/leads', [$data['id']]) }}"><span class="label label-success">View</span></a>   

                                                <br>
                                                <a href="{{ url('leads/delete', ['id' => $data['id']]) }}"  ><span class="label label-danger" onclick="return confirm('Are you sure you want to delete this lead ?')">Delete</span></a> 

                                                </td>
                      
                                            </tr>
                                            @endforeach
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
@endsection

