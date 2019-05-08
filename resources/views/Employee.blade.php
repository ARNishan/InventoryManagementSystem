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
                <div class="panel-heading"><h3 class="panel-title">Employee Information</h3></div>
                <div class="panel-body">
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <p>{{ $employee->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <p>{{ $employee->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <p>{{ $employee->phone }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <p>{{ $employee->address }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Experience</label>
                            <p>{{ $employee->experience }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo</label>
                            <br>
                            <img src="{{ URL::to($employee->photo) }}" alt="" style="height:80px;width:80px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NID</label>
                            <p>{{ $employee->nid }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Salary</label>
                            <p>{{ $employee->salary }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Vacation</label>
                            <p>{{ $employee->vacation }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                           <p>{{ $employee->city }}</p>
                        </div>
                </div><!-- panel-body -->
            </div> <!-- panel -->
      </div> <!-- col-->
     

 </div>
    


                    </div> <!-- container -->
                               
         </div> <!-- content -->
     </div>



@endsection