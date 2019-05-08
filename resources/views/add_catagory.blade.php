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
                <div class="panel-heading"><h3 class="panel-title">Add Catagory
                <a href="{{ route('all.catagory') }}" class="pull-right btn btn-purple waves-effect waves-light">All Catagory</a>
                </h3></div>
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
                    <form role="form" method="post" action="{{ url('/insert-catagory') }}">
                        @csrf
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Catagory Name</label>
                            <input type="text" class="form-control" name ="cat_name" placeholder="Catagory Name" required>
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