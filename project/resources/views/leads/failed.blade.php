@extends('layouts.admin')

 
@section('content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Failed Lead List</li>
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
                                <h4 class="m-b-0 text-white">Failed Lead List</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Lead Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Date</th>
                                                <th>Source</th>
                                                <th>Feedback</th>
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
                                                <td>{{ $data['feedback']['feedback'] }}</td>
                                                <td>
                                                    <a href="{{ url('/feedbacks/add', [$data['id']]) }}">
                                                        <span type="button" class="label label-info">Add Feedback</span>  
                                                    </a>
                                                   <br>
                                                    <a href="{{ url('/notes/view', [$data['id']]) }}">
                                                        <span type="button" class="label label-success">View All Notes</span>
                                                    </a>


                                                    <!--<a href="{{ url('/feedbacks/add', [$data['id']]) }}">
                                                        <img title="Add Feedback" style="width: 43px;" class="icons" src="{{ url('public/img/feedback.jpg') }}"/>
                                                    </a>
                                                   
                                                    <a href="{{ url('/notes/view', [$data['id']]) }}">
                                                        <img title="View All Notes" style="width: 30px;" class="icons" src="{{ url('public/img/view.png') }}"/>
                                                    </a>-->


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

