<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	$product = DB::table('products')
        ->join('catagories','products.cat_id','catagories.id')
        ->select('catagories.cat_name','products.*')
    	->get();
    	$customer = DB::table('customers')->get();
    	$catagory = DB::table('catagories')->get();
    	return view('pos',compact('product','customer','catagory'));
    }
    public function PendingOrder(){
        $pending = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','Pending')
        ->get();
        // echo "<pre>";
        // print_r($pending);
        return view('pending_orders',compact('pending'));
    }
    public function ViewOrder($id){
        $order = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.*','orders.*')
        ->where('orders.id',$id)
        ->first();
        $orderdetail = DB::table('orderdetails')
        ->join('products','orderdetails.product_id','products.id')
        ->select('products.product_name','products.product_code','orderdetails.*')
        ->where('order_id',$id)
        ->get();
         // echo "<pre>";
         // print_r($orderdetail);
        return view('order_confarmations',compact('order','orderdetail'));
    }
    public function DoneOrder($id){
        $approve = DB::table('orders')->where('id',$id)->update(['order_status' => 'Success']);
        if ($approve) {
                $notification=array(
                'messege'=>'Successfully order confirmed ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('pending.orders')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Something wrong! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            }

    }
    public function SuccessOrder(){
        $success = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','Success')
        ->get();
        // echo "<pre>";
        // print_r($pending);
        return view('success_orders',compact('success'));
    }

}
