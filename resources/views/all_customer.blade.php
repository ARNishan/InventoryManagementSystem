@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
	<div class="container">

<!-- Page-Title -->
		<div class="row">
		    <div class="col-sm-12">
		        <h4 class="pull-left page-title">All Customer !</h4>
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
                <h3 class="panel-title">Datatable</h3>
            </div>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Shop Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

         
                <tbody>
                	 @foreach($customers as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->address}}</td>
                        <td><img src="{{ URL::to($row->photo) }}" alt="" style="height:50px;width:50px;"></td>
                        <td>{{$row->shop_name}}</td>
                        <td><a href="{{ URL::to('/edit-customer/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ URL::to('/delete-customer/'.$row->id) }}"class="btn btn-sm btn-danger" id="delete">Delete</a>
                        <a href="{{ URL::to('/view-customer/'.$row->id) }}"class="btn btn-sm btn-primary"> View</a></td>
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