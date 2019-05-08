@extends('layouts.app')
@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title"></h4>
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
                <div class="panel-heading"><h3 class="panel-title">Add Expense
               <a href="{{ route('today.expense') }}" class="pull-right btn btn-info btn-sm" style="margin: 3px;">Today Expense</a><a href="{{-- {{ route('thismonth.expense') }} --}}" class="pull-right btn btn-info btn-sm" style="margin: 3px;">This Month Expense</a>
                </h3>
                  </div>
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
                    <form role="form" method="post" action="{{ url('/insert-expense') }}">
                    	@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expense Details</label>
                            <textarea class="form-control" name="detail" rows="4" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ammount</label>
                            <input type="text" class="form-control" name ="ammount" placeholder="Ammount" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name ="month" value="{{ date("F") }}"  required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name ="date" value="{{ date("d-m-y") }}" required>
                             <input type="hidden" class="form-control" name ="year" value="{{ date("Y") }}" required>
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

@endsection