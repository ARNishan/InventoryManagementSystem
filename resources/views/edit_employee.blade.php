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
                <div class="panel-heading"><h3 class="panel-title">Update Employee</h3></div>
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
                    <form role="form" method="post" action="{{ url('/update-employee/'.$employee->id) }}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name ="name" value="{{ $employee->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name ="email" value="{{ $employee->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" name ="phone" value="{{ $employee->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" name ="address" value="{{ $employee->address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Experience</label>
                            <input type="text" class="form-control" name ="experience" value="{{ $employee->experience }}">
                        </div>
                        <div class="form-group">
                            <img src="{{ URL::to($employee->photo) }}" alt="" style="height:80px;width:80px;" name="old_photo">
                            <br>
                        </div>
                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="exampleInputPassword1">New Photo</label>
                            <input type="file" name ="photo" accept="image/*" class="upload" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NID</label>
                            <input type="text" class="form-control" name ="nid" value="{{ $employee->nid }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Salary</label>
                            <input type="text" class="form-control" name ="salary" value="{{ $employee->salary }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Vacation</label>
                            <input type="text" class="form-control" name ="vacation" value="{{ $employee->vacation }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                            <input type="text" class="form-control" name ="city" value="{{ $employee->city }}" required>
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