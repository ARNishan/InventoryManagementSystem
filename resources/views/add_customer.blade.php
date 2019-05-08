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
                <div class="panel-heading"><h3 class="panel-title">Add Customer</h3></div>
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
                    <form role="form" method="post" action="{{ url('/insert-customer') }}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name ="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name ="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" name ="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" name ="address" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shop Name</label>
                            <input type="text" class="form-control" name ="shop_name" placeholder="Shop_name">
                        </div>
                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="exampleInputPassword1">Photo</label>
                            <input type="file" name ="photo" accept="image/*" class="upload" required onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account Holder</label>
                            <input type="text" class="form-control" name ="account_holder" placeholder="Account_Holder">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account_Number</label>
                            <input type="text" class="form-control" name ="account_number" placeholder="Account_Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bank Name</label>
                            <input type="text" class="form-control" name ="bank_name" placeholder="Bank_Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bank Branch</label>
                            <input type="text" class="form-control" name ="bank_branch" placeholder="Bank_Branch">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                            <input type="text" class="form-control" name ="city" placeholder="City">
                        </div>

                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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