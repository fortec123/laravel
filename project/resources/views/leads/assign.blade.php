@extends('layouts.admin')

 
@section('content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('leads') }}">Leads</a></li>
                        <li class="breadcrumb-item active">Assign Leads</li>
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

                         @if($errors->has('lead_id'))
                            <div class="alert alert-danger">{{ $errors->first('lead_id') }}</div>
                        @endif
                        
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Assign Leads</h4>
                            </div>
                            
                            <form class="form-horizontal form-label-left input_mask" id="assignForm" method='post' action="{{ route('assignLeadsEmployee') }}">

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                   
                                

                                <div class="table-responsive m-t-40">

                                        
                                            @csrf
                                            <div class="mian-dp">

                                        <div class="main-first">
                                                
                                                    <select class="form-control"  name="employee_id" id="employee_id">
                                                        <option value="">Select Employee</option>
                                                        @foreach($employees as $employees)
                                                            @if (old('employee_id') == $employees['id'])
                                                                <option value="{{ $employees['id'] }}" selected>{{ $employees['name'] }}</option>
                                                            @else
                                                                <option value="{{ $employees['id'] }}">{{ $employees['name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('employee_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('employee_id') }}</div>
                                                    @endif
                                                </div>

                                                <div class="second">
                                                <button type="submit" id="submitButton" class="btn btn-success save-data">Assign</button>
                                                </div>
                                                
                                            </div>

                                       

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                     
                                                <th>Lead Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Date</th>
                                                <th>Source</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($data as $data)
                                         
                                                <td>{{ $data['lead_name'] }}</td>
                                                <td>{{ $data['email'] }}</td>
                                                <td>{{ $data['phone_no'] }}</td>
                                                <td>{{ $data['created_at'] }}</td>
                                                <td>{{ $data['source']['source_name'] }}</td>
                                                
                                                <td><input type="checkbox" name="lead_id[]" value="{{ $data['id'] }}" id="basic_checkbox_{{ $data['id'] }}" >
                                    <label for="basic_checkbox_{{ $data['id'] }}"></label></td>


                      
                                            </tr>
                                            @endforeach
                                            
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

               
        </div>
        

 
  
@endsection

