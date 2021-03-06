@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
	<div class="container">

<!-- Page-Title -->
		<div class="row">
		    <div class="col-sm-12">
		        <h4 class="pull-left page-title">Welcome</h4>
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
                <h3 class="panel-title">All Success Order </h3>
            </div>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Total Product</th>
                        <th>Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

         
                <tbody>
                	 @foreach($success as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->order_date}}</td>
                        <td>{{$row->total_products}}</td>
                        <td>{{$row->total}}</td>
                        <td><span class="badge badge-success">{{$row->order_status}}</span></td>
                        <td>{{$row->payment_status}}</td>
                        <td>
                        <a href="{{ URL::to('/view-order-status/'.$row->id) }}"class="btn btn-sm btn-primary"> View</a></td>
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