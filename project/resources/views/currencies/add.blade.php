@extends('layouts.admin')

 
@section('content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('currencies') }}">Currencies</a></li>
                        <li class="breadcrumb-item active">Add Currency</li>
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
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Currency</h4>
                            </div>
                            <div class="card-body">
                                <form method='post' action="{{ route('currencies.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <!--<h3 class="card-title">Add Broker Details</h3>
                                        <hr>-->
                                        <div class="row p-t-20">
                                            
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">NumCode</label>
                                                    <input type="text" id="NumCode" name='NumCode' class="form-control" placeholder="Enter NumCode" value="{{ old('NumCode') }}">
                                                    @if($errors->has('NumCode'))
                                                        <div class="alert alert-danger">{{ $errors->first('NumCode') }}</div>
                                                    @endif
                                                </div>

                                            </div>


                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">CharCode</label>
                                                    <input type="text" id="CharCode" name='CharCode'class="form-control" placeholder="Enter CharCode" value="{{ old('CharCode') }}">
                                                    @if($errors->has('CharCode'))
                                                        <div class="alert alert-danger">{{ $errors->first('CharCode') }}</div>
                                                    @endif
                                                </div>

                                            </div>



                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Nominal</label>
                                                    <input type="text" id="Nominal" name='Nominal'class="form-control" placeholder="Enter Nominal" value="{{ old('Nominal') }}">
                                                    @if($errors->has('Nominal'))
                                                        <div class="alert alert-danger">{{ $errors->first('Nominal') }}</div>
                                                    @endif
                                                </div>

                                            </div>


                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="Name" name='Name'class="form-control" placeholder="Enter Name" value="{{ old('Name') }}">
                                                    @if($errors->has('Name'))
                                                        <div class="alert alert-danger">{{ $errors->first('Name') }}</div>
                                                    @endif
                                                </div>

                                            </div>


                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Value</label>
                                                    <input type="text" id="Value" name='Value'class="form-control" placeholder="Enter Value" value="{{ old('Value') }}">
                                                    @if($errors->has('Value'))
                                                        <div class="alert alert-danger">{{ $errors->first('Value') }}</div>
                                                    @endif
                                                </div>

                                            </div>





                                        </div>



                                        

                                         <div class="row p-t-20">
                                                <div class="col-md-6">
                                                <div class="form-actions">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <input type="reset" class="btn btn-inverse" value="Cancel" />
                                                 <a href="{{ url('currencies') }}"><button type="button" class="btn btn-info">Back</button></a>
                                        </div>

                                               
                                            </div>
                                   
                                             
                                      
                                        </div>
                                
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        
               
       
               
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
  
@endsection

