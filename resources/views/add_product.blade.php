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
                <div class="panel-heading"><h3 class="panel-title">Add Product
                    <a href="{{ route('import.product') }}" class="btn btn-sm btn-danger pull-right">Import Product</a> </h3></div>
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
                    <form role="form" method="post" action="{{ url('/insert-product') }}" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" name ="product_name" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Catagory</label>
                            <select name ="cat_id" class="form-control">
                                @php
                                $cat = DB::table('catagories')->get();
                                @endphp
                                <option disabled="" selected=""></option>
                                @foreach($cat as $row)
                               <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Supplier</label>
                            <select name ="sup_id" class="form-control">
                                @php
                                $cat = DB::table('suppliers')->get();
                                @endphp
                                <option disabled="" selected=""></option>
                                @foreach($cat as $row)
                               <option value="{{ $row->id }}">{{ $row->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Code</label>
                            <input type="text" class="form-control" name ="product_code" placeholder="Product Code" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Garage</label>
                            <input type="text" class="form-control" name ="product_garage" placeholder="Product Garage" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Route</label>
                            <input type="text" class="form-control" name ="product_route" placeholder="Product Route" required> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Buy Date</label>
                            <input type="date" class="form-control" name ="buy_date" placeholder="Buy Date" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Expire Date</label>
                            <input type="date" class="form-control" name ="expire_date" placeholder="Expire Date" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Buying Price</label>
                            <input type="text" class="form-control" name ="buying_price" placeholder="Buying Price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Selling Price</label>
                            <input type="text" class="form-control" name ="selling_price" placeholder="Selling Price" required>
                        </div>
                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="exampleInputPassword1">Photo</label>
                            <input type="file" name ="product_image" accept="image/*" class="upload" required onchange="readURL(this);">
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