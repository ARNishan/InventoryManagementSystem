@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
    <div class="container">


        @php
         $year = date("Y");
         $totalExpense = DB::table('expenses')->where('year',$year)->sum('ammount');
        @endphp

<!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title"> Total Expense <?php $year = date("Y"); echo "$year"; ?> :  <?php echo "$totalExpense"; ?> </h4>
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
                <h3 class="panel-title"><?php $year = date("Y"); echo "$year"; ?> All Expense
                <a href="{{ route('add.expense') }}" class="pull-right btn btn-info btn-sm">Add New</a>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Expense Detail</th>
                        <th>Ammount</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

         
                <tbody>
                    <?php $i = 0;?>
                     @foreach($year_expense as $row)
                       <?php $i++;?>
                    <tr>
                        <td><?php echo "$i"; ?></td>
                        <td>{{$row->detail}}</td> 
                        <td>{{$row->ammount}}</td>   
                        {{-- <td><a href="{{ URL::to('/edit-tdyexpense/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ URL::to('/delete-catagory/'.$row->id) }}"class="btn btn-sm btn-danger" id="delete">Delete</a></td> --}}
                        
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