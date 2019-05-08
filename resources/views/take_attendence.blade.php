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
                <h3 class="panel-title">Take Attendence</h3>
            </div>
            <h3 class="text-success" align="center">Today : {{ date('d-m-y') }}</h3>
            <div class="panel-body">
                <div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
 <form action="{{ url('/insert-attendence') }}" method="post">
 @csrf
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Attendence</th>
                    </tr>
                </thead>

         
                <tbody>
                	 @foreach($user as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td><img src="{{ URL::to($row->photo) }}" alt="" style="height:50px;width:50px;"></td>
                        <input type="hidden" name="user_id[]" value="{{ $row->id  }}">
                        <td>
                            <input type="radio" name="attendence[{{ $row->id  }}]" value="Present" required="">Present
                            <input type="radio" name="attendence[{{ $row->id  }}]" value="Absence">Absence
                        </td>
                        <input type="hidden" name="att_date" value="{{ date('d-m-y')  }}">
                        <input type="hidden" name="att_year" value="{{ date('Y') }}">
                    </tr>
                   @endforeach
                    
               </tbody>
         </table>
             <button type="submit" class="btn btn-success">Take Attendence</button>
 </form>

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