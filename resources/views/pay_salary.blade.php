@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
    <div class="container">

<!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Pay</h4>
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
                <h3 class="panel-title">Pay Salary
                <span class="pull-right">{{ date('F Y') }}</span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Salary</th>
                        {{-- <th>Advanced</th> --}}
                        <th>Month</th>
                        {{-- <th>Year</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>

         
                <tbody>
                     @foreach($emp as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td><img src="{{ URL::to($row->photo) }}" alt="" style="height:50px;width:50px;"></td>
                        <td>{{$row->salary}}</td>
                       {{--  <td>{{$row->advance_salary}}</td> --}}
                        <td><span class="badge badge-success">{{date("F",strtotime('-1 month'))}}</span></td>
                        {{-- <td>{{$row->year}}</td> --}}
                        <td><a class="btn btn-sm btn-primary" href="">Pay Now</a></td>
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