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
                        <li class="breadcrumb-item active">View Leads</li>
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
                                <h4 class="m-b-0 text-white">View Leads</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                    
                          
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
                                                    <label class="control-label">Lead Details</label>
                                                     <h6 class="card-subtitle">{{$data['lead_details']}}</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-t-20">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                     <h6 class="card-subtitle">{{$data['email']}}</h6>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                     <h6 class="card-subtitle">{{$data['phone_no']}}</h6>
                                                </div>
                                            </div>
                                   
                                        </div>


                                         <div class="row p-t-20">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Source</label>
                                                     <h6 class="card-subtitle">{{$data['source']['source_name']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Assign To</label>
                                                      <h6 class="card-subtitle">{{$data['user']['first_name'].' '.$data['user']['last_name']}}</h6>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Total Amount</label>
                                                     <h6 class="card-subtitle">{{$data['total_amount']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">No of Installments</label>
                                                      <h6 class="card-subtitle">{{$data['no_of_installment']}}</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-t-20">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label><br>
                                                     @if($data['status'] == 1)
                                                    <span class="label label-warning">Pending</span>
                                                    @elseif($data['status'] == 2)
                                                    <span class="label label-danger">Failed</span>
                                                    @else
                                                    <span class="label label-success">Closed</span>
                                                    @endif</h6>
                                                </div>
                                            </div>

                                        </div>
                                     
                               
                                   
                                       
                                        
                                    </div>

                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
@endsection

