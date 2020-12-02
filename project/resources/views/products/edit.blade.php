@extends('layouts.admin')

 
@section('content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                                <h4 class="m-b-0 text-white">Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <form method='post' action="{{route('products.update', [$product->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="form-body">
                                        <!--<h3 class="card-title">Add Broker Details</h3>
                                        <hr>-->
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <!--<input type="text" id="name" name='name'class="form-control" placeholder="Enter Name" value="{{ old('name') }}">-->

                              
                                                    <select name="category_id" id="category_id" class="form-control custom-select">

                                                    <option value="">Select Category</option>
                                                    @foreach($data as $data)
                                                        <option value="{{$data['id']}}" {{ ( $data['id'] == $product->category_id) ? 'selected' : '' }}>
                                                        {{$data['name']}}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                    @if($errors->has('category_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="name" name='name'class="form-control" placeholder="Enter Name" value="{{ $product->name }}">
                                                    @if($errors->has('name'))
                                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>

                                            </div>
                                            </div>


                                             <div class="row p-t-20">
                                                <div class="col-md-6">

                                                 <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" id="description" name='description'class="form-control" placeholder="Enter Description" value="{{ $product->description }}">
                                                    @if($errors->has('description'))
                                                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                                    @endif
                                                </div>
                                                 </div>

                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Actual Price</label>
                                                    <input type="text" id="actual_price" name='actual_price'class="form-control" placeholder="Enter Actual Price" value="{{ $product->actual_price }}">
                                                    @if($errors->has('actual_price'))
                                                        <div class="alert alert-danger">{{ $errors->first('actual_price') }}</div>
                                                    @endif
                                                </div>
                                                </div>
                                                </div>

                                            <div class="row p-t-20">
                                                <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Sale Price</label>
                                                    <input type="text" id="sale_price" name='sale_price'class="form-control" placeholder="Enter Sale Price" value="{{ $product->sale_price }}">
                                                    @if($errors->has('sale_price'))
                                                        <div class="alert alert-danger">{{ $errors->first('sale_price') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Packaging</label>
                                        <select name="packaging" id="packaging" class="form-control custom-select">
                                                <option value="">Select Packaging</option>
                                                <option value="6" {{ ( $product->packaging == 6) ? 'selected' : '' }}>6 Pcs</option>
                                                <option value="12" {{ ( $product->packaging == 12) ? 'selected' : '' }}>12 Pcs</option>
                                                <option value="25" {{ ( $product->packaging == 25) ? 'selected' : '' }}>25 Pcs</option>
                                                <option value="30" {{ ( $product->packaging == 30) ? 'selected' : '' }}>30 Pcs</option>
                                        </select>
                                                    @if($errors->has('packaging'))
                                                        <div class="alert alert-danger">{{ $errors->first('packaging') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                                
                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Recommended</label>
                                                    <!--<input type="text" id="name" name='name'class="form-control" placeholder="Enter Name" value="{{ old('name') }}">-->


                                                    <select name="is_recommended" id="is_recommended" class="form-control custom-select">
                                                      <option value="1" {{ ( $product->is_recommended == 1) ? 'selected' : '' }}>No</option>
                                                      <option value="2" {{ ( $product->is_recommended == 2) ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    @if($errors->has('is_recommended'))
                                                        <div class="alert alert-danger">{{ $errors->first('is_recommended') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Popular</label>
                                                    <select name="is_popular" id="is_popular" class="form-control custom-select">
                                                      <option value="1" {{ ( $product->is_popular == 1) ? 'selected' : '' }}>No</option>
                                                      <option value="2" {{ ( $product->is_popular == 2) ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    @if($errors->has('is_popular'))
                                                        <div class="alert alert-danger">{{ $errors->first('is_popular') }}</div>
                                                    @endif
                                                </div>

                                            </div>
                                            </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                     <input type="file" name="image" class="form-control form-control-line">
                                                </div>

                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Discount</label>
                                                    <input type="text" id="discount" name='discount'class="form-control" placeholder="Enter Discount" value="{{ $product->discount }}">
                                                    @if($errors->has('discount'))
                                                        <div class="alert alert-danger">{{ $errors->first('discount') }}</div>
                                                    @endif
                                                </div>
                                            </div>
    
                                        </div>

                                        <img style="width: 100px" src="{{ $product->image }}">

                                         <div class="row p-t-20">
                                                <div class="col-md-6">
                                                <div class="form-actions">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <input type="reset" class="btn btn-inverse" value="Cancel" />
                                                 <a href="{{ url('products') }}"><button type="button" class="btn btn-info">Back</button></a>
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

