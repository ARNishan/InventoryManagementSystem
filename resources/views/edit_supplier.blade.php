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
                <div class="panel-heading"><h3 class="panel-title">Update Supplier</h3></div>
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
                    <form role="form" method="post" action="{{ url('/update-supplier/'.$supplier->id) }}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name ="name" value="{{ $supplier->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name ="email" value="{{ $supplier->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" name ="phone" value="{{ $supplier->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" name ="address" value="{{ $supplier->address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Supplier type</label>
                            <input type="text" class="form-control" name ="type" value="{{ $supplier->type }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shop Name</label>
                            <input type="text" class="form-control" name ="shop_name" value="{{ $supplier->shop_name }}">
                        </div>
                        <div class="form-group">
                            <img src="{{ URL::to($supplier->photo) }}" alt="" style="height:80px;width:80px;" name="old_photo">
                            <br>
                        </div>
                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="exampleInputPassword1">New Photo</label>
                            <input type="file" name ="photo" accept="image/*" class="upload" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account Holder</label>
                            <input type="text" class="form-control" name ="account_holder" value="{{ $supplier->account_holder }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account Number</label>
                            <input type="text" class="form-control" name ="account_number" value="{{ $supplier->account_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bank Name</label>
                            <input type="text" class="form-control" name ="bank_name" value="{{ $supplier->bank_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Branch Name</label>
                            <input type="text" class="form-control" name ="bank_branch" value="{{ $supplier->bank_branch }}" required>
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