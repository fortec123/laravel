@extends('layouts.admin')

 
@section('content')

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                                <h4 class="m-b-0 text-white">Orders</h4>
                            </div>

                            <div class="card-body">


                                 <!-- sample modal content -->
                                <div id="status-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form id="ajaxform">

                                             <meta name="csrf-token" content="{{ csrf_token() }}" />

                                             <div>
                                            <ul></ul>
                                    

                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                              <div class="alert alert-danger print-error-msg" style="display:none">
                                               <ul></ul>
                                                </div>
                                            <div class="modal-body">
                                                
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Select Status: </label>
                                                        <select class="form-control" id="status" name="status" required>
                                                        <option value="">Select Status</option>
                                                        <option value="2">Accept</option>
                                                        <option value="3">Reject</option>
                                                          <option value="5">Deliver</option>
                                                        </select>
                                                        @if($errors->has('status'))
                                                        <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                                                    @endif
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                            <input type="hidden" id="order_id" name="order_id">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button id="save-data" type="button" class="btn btn-info waves-effect waves-light ">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                               <!-- <a type="button" href="{{ route('orders.create') }}" class="btn btn-success addButton"> + Add Order</a>-->

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Order By</th>
                                                <th>Total Items</th>
                                                <th>Total Amount (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Payment Mode</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $data)
                                            <tr>
                                                <td>{{ $data['id'] }}</td>
                                                <td>{{ $data['user']['name'] }}</td>
                                                <td>{{ count(json_decode($data['order'])) }}</td>
                                                <td>{{ $data['total'] }} </td>
                                                <td>{{ date('d M, Y', strtotime($data['created_at'])) }}</td>
                                                 
                                                @if($data['status'] == 1)
                                                    <td><span class="label label-warning">Pending</span></td>
                                                @elseif($data['status'] == 2)
                                                    <td><span class="label label-info">Accecpted</span></td>
                                                @elseif($data['status'] == 3)
                                                    <td><span class="label label-danger">Rejected</span></td>
                                                @elseif($data['status'] == 4)
                                                    <td><span class="label label-danger">Canceled</span></td>
                                                @else
                                                    <td><span class="label label-success">Delivered</span></td>
                                                @endif

                                                @if($data['payment']['mode'] == 1)
                                                    <td><span class="label label-success">Online</span></td>
  
                                                @else
                                                    <td><span class="label label-warning">COD</span></td>
                                                @endif

                                                <td>
                                                    <span class="label label-info" onclick="document.getElementById('order_id').value={{ $data['id'] }}" data-toggle="modal" data-target="#status-modal">Change Status</span>
                                                </td>

                                               
                                                <!--<td><a href="#"><span class="label label-success">View</span></a>  </td>-->
                                          
                                                 <!--<td><img style="width: 32px;" src="@if(!empty($data['image']))
                                                    {{ url('storage/app/images/'.$data['image']) }}
                                                @else
                                                  {{ url('storage/app/images/default.jpg') }}
                                                @endif"></td>
                                               <td> 
                                                <a href="{{ url('products/delete', ['id' => $data['id']]) }}"  ><span class="label label-danger" onclick="return confirm('Are you sure you want to delete this product ?')">Delete</span></a>
                                                </td>-->
                                                
                                            </tr>
                                             @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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



<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
<script src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
$( document ).ready(function() {
  
  $("#save-data").click(function(event){
      event.preventDefault();
     
      let status = $("select[name=status]").val(); 
      let order_id = $("input[name=order_id]").val(); 
      let _token   = $('meta[name="csrf-token"]').attr('content');


//alert(status+'--order='+order_id+'--token='+_token);

      $.ajax({
        url: '{{route("changeStatus")}}',
        type:"POST",
        data:{
          order_id:order_id,
          status:status,
          _token: _token
        },
        success:function(response){

            //console.log(response);

            if($.isEmptyObject(response.error)){
                console.log(response);
                toastr.success(response.success,'Success!')
                  if(response) {
                     $(".print-error-msg").css('display','none');
                    $('.success').text(response.success);
                    location.reload(true);
                    $("#ajaxform")[0].reset();
                  //}else{
                   // printErrorMsg(response.error);
                  }

            }else{
                //printErrorMsg(response.error);
                
                 //$('.error').text(response.error);
                  toastr.error(response.error,'Error!');
                  // location.reload(true);
               // toastr.error('errors messages');
            }

        },
       });


      function printErrorMsg (msg) {
        console.log(msg);
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            //$.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
           // });
        }


  });

});
</script>
  
  
@endsection

