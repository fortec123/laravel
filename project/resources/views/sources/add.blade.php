@extends('layouts.admin')

 
@section('content')



<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('sources') }}">Sources</a></li>
                        <li class="breadcrumb-item active">Add Source</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>


    <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Source</h4>
                            </div>
                            <div class="card-body">
                                <form id="ajaxform">

                                      <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    
                                    <div class="form-body">
                                        <!--<h3 class="card-title">Add Lead Details</h3>
                                        <hr>-->

                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Source</label>
                                                    <input type="text" id="source_name" name='source_name' class="form-control" placeholder="Enter Source" value="{{ old('source_name') }}">
                                                    @if($errors->has('source_name'))
                                                        <div class="alert alert-danger">{{ $errors->first('source_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success save-data"> <i class="fa fa-check"></i> Save</button>
                                        <input type="reset" class="btn btn-inverse" value="Cancel" />
                                            <a href="{{ url('sources') }}"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
     
    </div>
	
    <script>

  $(".save-data").click(function(event){
      event.preventDefault();
     
      let source_name = $("input[name=source_name]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: '{{route("sources.store")}}',
        type:"POST",
        data:{
          source_name:source_name,
          _token: _token
        },
        success:function(response){

            console.log(response);

            if($.isEmptyObject(response.error)){
                toastr.success(response.success,'Success!')
                  if(response) {
                     $(".print-error-msg").css('display','none');
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                  }

            }else{
                printErrorMsg(response.error);
            }

        },
       });


      function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }


  });
</script>
  
@endsection

