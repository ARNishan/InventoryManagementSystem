@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">ABC Comphany</a></li>
                                    <li class="active">IT</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
    <div class="row">
    	<div class="col-md-2"></div>

    	 <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Comphany Information</h3></div>
	                @if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				   @endif
                <div class="panel-body">
                    <form role="form" method="post" action="{{ url('/update-website/'.$set->id) }}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comphany Name</label>
                            <input type="text" class="form-control" name ="comphany_name" value="{{ $set->comphany_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany Email</label>
                            <input type="email" class="form-control" name ="comphany_email" value="{{ $set->comphany_email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany Phone</label>
                            <input type="text" class="form-control" name ="comphany_phone" value="{{ $set->comphany_phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany Address</label>
                            <input type="text" class="form-control" name ="comphany_address" value="{{ $set->comphany_address }}" required>
                        </div>
                        <div class="form-group">
                            <img src="{{ URL::to($set->comphany_logo) }}" alt="" style="height:80px;width:80px;" name="old_photo">
                            <br>
                        </div>
                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="exampleInputPassword1">Comphany Logo </label>
                            <input type="file" name ="comphany_logo" accept="image/*" class="upload" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany City</label>
                            <input type="text" class="form-control" name ="comphany_city" value="{{ $set->comphany_city }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany Country</label>
                            <input type="text" class="form-control" name ="comphany_country" value="{{ $set->comphany_country }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comphany Zip code</label>
                            <input type="text" class="form-control" name ="comphany_zipcode" value="{{ $set->comphany_zipcode }}" required>
                        </div>

                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
      </div> <!-- col-->
     

 </div>
    


                    </div> <!-- container -->
                               
         </div> <!-- content -->
     </div>

     <script type="text/javascript">
     	function readURL(input){
     		if (input.files && input.files[0]) {
     		var reader = new FileReader();
     		reader.onload = function(e){
     			$('#image')
     			.attr('src', e.target.result)
     			.width(80)
     			.height(80);
     		};
     		reader.readAsDataURL(input.files[0]);
     	}
     }

     </script>

@endsection