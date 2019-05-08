@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
<!-- Start content -->
    <div class="content">
        <div class="container">

        <!-- Page-Title -->
            <div class="row">
             <div class="col-sm-12">
             <h4 class="pull-left page-title">Invoice</h4>
             <ol class="breadcrumb pull-right">
             <li><a href="#">ABC Comphany</a></li>
             <li><a href="#">Pages</a></li>
             <li class="active">Invoice</li>
             </ol>
             </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">
                <!-- <div class="panel-heading">
                <h4>Invoice</h4>
                </div> -->
                  <div class="panel-body">
                   <div class="clearfix">
                    <div class="pull-left">
                     <h4 class="text-right">ABC Comphany</h4>

                     </div>
                        <div class="pull-right">
                         <h4>Today <br>
                         <strong>{{ date('d-m-y') }}</strong>
                         </h4>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-md-12">

                <div class="pull-left m-t-30">
                <address>
                <strong>Name : {{ $order->name }}</strong><br>
                Shop Name : {{ $order->shop_name }}<br>
                Address : {{ $order->address }}<br>
                City : {{ $order->city }}<br>
                Phone : {{ $order->phone }}
                </address>
                </div>
                <div class="pull-right m-t-30">
                <p><strong>Order Date: </strong> {{ $order->order_date }}</p>
                <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{ $order->order_status }}</span></p>
                {{-- @php
                $Order = DB::table('orders')->select('id')->first();
                @endphp --}}
                <p class="m-t-10"><strong>
                Order ID : {{ $order->id }}
                {{-- @php
                ++$order;
                echo"$order";
                @endphp  --}}
                </strong></p>
                </div>
                </div>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                <div class="col-md-12">
                <div class="table-responsive">
                <table class="table m-t-30">
                <thead>
                    <tr><th>#</th>
                    <th>Item</th>
                    <th>Item Code</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total</th>
                </tr></thead>
                <tbody>
                     @php
                         $i = 1;
                        @endphp
                        @foreach($orderdetail as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->product_code }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->unit_cost}}</td>
                        <td>{{ $row->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
                </div>
                </div>
                <div class="row" style="border-radius: 0px;"><br>
                    <div class="col-md-9">
                        <h5>
                <b>Payment Status :</b> {{ $order->payment_status }}<br>
                <b>Pay :</b> {{ $order->pay }}<br>
                <b>Due :</b> {{ $order->due }}</h5>
                    </div>
                <div class="col-md-3">
                <p class="text-right"><b>Sub-total :</b> {{ $order->sub_total }}</p>
                <p class="text-right"><b>VAT :</b> {{ $order->vat }}</p>
                <hr>
                <h3 class="text-right"><b>Total :</b> {{ $order->total }}</h3>
                </div>
                </div>
                <hr>
                @if($order->order_status == 'Success')
                @else
                <div class="hidden-print">
                <div class="pull-right">
                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                <a href="{{ URL::to('/order-done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                </div>
                @endif
                </div>
                </div>
                </div>

            </div>

            </div>



        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


{{-- <form action="{{ url('/final-invoice') }}" method="post">
@csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog"> 
    <div class="modal-content"> 
        <div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
            <h4 class="modal-title">Invoice of {{ $customer->name }}
                <span class="pull-right">Total : {{ Cart::total() }}</span></h4> 
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
        <div class="modal-body">  
            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="form-group"> 
                        <label for="field-4" class="control-label">Payment Method</label> 
                       <select class="form-control" name="payment_status">
                           <option disabled="" selected="">Select Payment Method</option>
                           <option value="HandCash">HandCash</option>
                           <option value="Cheque">Cheque</option>
                           <option value="Due">Due</option>
                       </select>

                    </div> 
                </div> 
                <div class="col-md-4"> 
                    <div class="form-group"> 
                        <label for="field-6" class="control-label">Due</label> 
                        <input type="text" class="form-control" id="field-6" name="due"> 
                    </div> 

                </div> 
             </div> 
             <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group"> 
                        <label for="field-5" class="control-label">Pay</label> 
                        <input type="text" class="form-control" id="field-5" name="pay"> 
                    </div> 
                </div> 
                  <div class="col-md-6"> 
                    <div class="form-group"> 
                        <label for="field-6" class="control-label">Due</label> 
                        <input type="text" class="form-control" id="field-6" name="due"> 
                    </div> 

                </div> 
             </div>



            </div> 
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <input type="hidden" name="order_date" value="{{ date('d-m-y') }}">
            <input type="hidden" name="order_status" value="Pending">
            <input type="hidden" name="total_products" value="{{ Cart::count() }}">
            <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
            <input type="hidden" name="vat" value="{{ Cart::tax() }}">
            <input type="hidden" name=" total" value="{{ Cart::total() }}">
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
        </div> 
    </div> 
</div>
</div><!-- /.modal -->
</form> --}}

@endsection
