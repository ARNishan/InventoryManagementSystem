@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
	<div class="container">

<!-- Page-Title -->
		<div class="row">
		    <div class="col-sm-12">
		        <h4 class="pull-left page-title">All Products</h4>
		        <ol class="breadcrumb pull-right">
		            <li><a href="#">ABC Comphany</a></li>
		            <li class="active">IT</li>
		        </ol>
		    </div>
		</div>

	                        <!-- Start Widget -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datatable
                    <a href="{{ route('add.product') }}" class="pull-right btn btn-info btn-sm">Add New</a></h3>
            </div>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Code</th>
                        <th>Selling Price</th>
                        <th>Garage</th>
                        <th>Route</th>
                        <th>Expire Date</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>

         
                <tbody>
                	 @foreach($product as $row)
                    <tr>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->product_code}}</td>
                        <td>{{$row->selling_price}}</td>
                        <td>{{$row->product_garage}}</td>
                        <td>{{$row->product_route}}</td>
                        <td>{{$row->expire_date}}</td>
                        <td><img src="{{ URL::to($row->product_image) }}" alt="" style="height:50px;width:50px;"></td>
                        <td><a href="{{ URL::to('/edit-product/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ URL::to('/delete-product/'.$row->id) }}"class="btn btn-sm btn-danger" id="delete">Delete</a>
                        <a href="{{ URL::to('/view-product/'.$row->id) }}"class="btn btn-sm btn-primary"> View</a></td>
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

    </div> <!-- container -->
  </div> <!-- content -->
</div><!-- content-page -->

     
@endsection