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
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Supplier Information</h3></div>
                <div class="panel-body">
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <p>{{ $supplier->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <p>{{ $supplier->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <p>{{ $supplier->phone }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <p>{{ $supplier->address }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Supplier Type</label>
                            <p>{{ $supplier->type }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shop Name</label>
                            <p>{{ $supplier->shop_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo</label>
                            <br>
                            <img src="{{ URL::to($supplier->photo) }}" alt="" style="height:80px;width:80px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account Holder</label>
                            <p>{{ $supplier->account_holder }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Account Number</label>
                            <p>{{ $supplier->account_number }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bank Name</label>
                            <p>{{ $supplier->bank_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Branch Name</label>
                            <p>{{ $supplier->bank_branch }}</p>
                        </div>
                        
                </div><!-- panel-body -->
            </div> <!-- panel -->
      </div> <!-- col-->
     

 </div>
    


                    </div> <!-- container -->
                               
         </div> <!-- content -->
     </div>



@endsection