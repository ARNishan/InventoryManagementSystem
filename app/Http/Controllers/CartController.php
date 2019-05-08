<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB; 

class CartController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
     public function AddCart(Request $request){
     	$data = array();
     	$data['id'] = $request->id;
     	$data['name'] = $request->name;
     	$data['qty'] = $request->qty;
     	$data['price'] = $request->price;
     	$data['weight'] = $request->weight;
     	// echo "<pre>";
     	// print_r($data);
     	$add = Cart::add($data);
     	if($add){
    		 $notification=array(
                'messege'=>'Cart Added Successfully ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
        }else{
        	$notification=array(
                'messege'=>'Somthing Rong! ',
                'alert-type'=>'error'
                 );
          return Redirect()->back()->with($notification);

        }
    }
    public function UpdateCart(Request $request,$rowId){
     	$data = array();
     	$data['qty'] = $request->qty;
     	// echo "<pre>";
     	// print_r($data);
     	$Update = Cart::update($rowId,$data);
     	if($Update){
    		 $notification=array(
                'messege'=>'Cart Updated Successfully ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
        }else{
        	$notification=array(
                'messege'=>'Somthing Rong! ',
                'alert-type'=>'error'
                 );
          return Redirect()->back()->with($notification);

        }
    }
    public function RemoveCart($rowId){
     	$Delete = Cart::remove($rowId);
     	if($Delete){
    		 $notification=array(
                'messege'=>'Somthing Rong! ',
                'alert-type'=>'error'
                 );
          return Redirect()->back()->with($notification);
        }else{
        	$notification=array(
                'messege'=>'Cart Remove Successfully ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);

        }
    }
    public function CreateInvoice(Request $request){
     // $contents = Cart::content();
    //  $cus_id = $request->cusid;
    //  // echo "<pre>";
    //  // print_r($contents);
    //  // echo "<br>";
    // echo"$cus_id";
    	$validatedData = $request->validate([
        'Customer' => 'required',
         ],[
         'Customer.required' => 'Select A Customer First',
         ]);
    	$cusid = $request->Customer;
    	$customer = DB::table('customers')->Where('id',$cusid)->first();
    	// echo "<pre>";
     //    print_r($customer);
    	$contents = Cart::content();
    	// echo "<pre>";
     //    print_r($contents);
        // return redirect()->route('invoice',compact('customer','contents'));

    	 return view('invoice',compact('customer','contents'));

    }
    // public function Invoice(){
    //     return view('invoice',compact('customer','contents'));
    // }

    public function FinalInvoice(Request $request){
    	$validatedData = $request->validate([
        'payment_status' => 'required',
         ],[
         'payment_status.required' => 'Select Payment Method',
         ]);
     	$data = array();
     	$data['customer_id'] = $request->customer_id;
     	$data['order_date'] = $request->order_date;
     	$data['order_status'] = $request->order_status;
     	$data['total_products'] = $request->total_products;
     	$data['sub_total'] = $request->sub_total;
     	$data['vat'] = $request->vat;
     	$data['total'] = $request->total;
     	$data['payment_status'] = $request->payment_status;
     	$data['pay'] = $request->pay;
     	$data['due'] = $request->due;
     	// echo "<pre>";
     	// print_r($data);
     	$order_id = DB::table('orders')->insertGetId($data);
     	$contents = Cart::content();
     	$odata = array();
     	foreach ($contents as $key => $content) {
     		$odata['order_id'] = $order_id;
     		$odata['product_id'] = $content->id;
     		$odata['quantity'] = $content->qty;
     		$odata['unit_cost'] = $content->price;
     		$odata['total'] = $content->total;
            $insert = DB::table('orderdetails')->insert($odata);
     	}
     	if($insert){
    		 $notification=array(
                'messege'=>'Successfully Invoice Created | Please delever the product and accept status ! ',
                'alert-type'=>'success'
                 );
    		 Cart::destroy();
        return Redirect()->route('pos')->with($notification);
        }else{
        	$notification=array(
                'messege'=>'Somthing Rong! ',
                'alert-type'=>'error'
                 );
          return Redirect()->route('pos')->with($notification);

        }
    }
}
