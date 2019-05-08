@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
 <div class="content">
    <div class="container">

@php     
         $month_name=$month;
         $totalExpense = DB::table('expenses')->where('month',$month_name)->sum('ammount');
@endphp

<!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title"> Total Expense <?php echo "$month_name"; ?> :  <?php echo "$totalExpense"; ?> </h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">ABC Comphany</a></li>
                    <li class="active">IT</li>
                </ol>
            </div>
        </div>
        <div>
            <a href="{{ route('January.expense') }}" class="btn btn-sm btn-info">January</a>
            <a href="{{ route('February.expense') }}" class="btn btn-sm btn-info">February</a>
            <a href="{{ route('March.expense') }}" class="btn btn-sm btn-info">March</a>
            <a href="{{ route('April.expense') }}" class="btn btn-sm btn-info">April</a>
            <a href="{{ route('May.expense') }}" class="btn btn-sm btn-info">May</a>
            <a href="{{ route('June.expense') }}" class="btn btn-sm btn-info">June</a>
            <a href="{{ route('July.expense') }}" class="btn btn-sm btn-info">July</a>
            <a href="{{ route('August.expense') }}" class="btn btn-sm btn-info">August</a>
            <a href="{{ route('September.expense') }}" class="btn btn-sm btn-info">September</a>
            <a href="{{ route('October.expense') }}" class="btn btn-sm btn-info">October</a>
            <a href="{{ route('November.expense') }}" class="btn btn-sm btn-info">November</a>
            <a href="{{ route('December.expense') }}" class="btn btn-sm btn-info">December</a>
        </div>

                            <!-- Start Widget -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php $month = date("F"); echo "$month"; ?> All Expense
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
                        <th>Date</th>
                        <th>Ammount</th>

                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

         
                <tbody>
                    <?php $i = 0;?>

                     @foreach($month_expense as $row)
                       <?php $i++;?>
                    <tr>
                        <td><?php echo "$i"; ?></td>
                        <td>{{$row->detail}}</td> 
                        <td>{{$row->date}}</td> 
                        <td>{{$row->ammount}}</td>   
                       {{--  <td><a href="{{ URL::to('/edit-tdyexpense/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
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