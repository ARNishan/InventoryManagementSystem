<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_customer');
    }
       public function Store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:customers|max:255',
        'phone' => 'required',
        'address' => 'required',
        'photo' => 'required',
        
         ]);
    	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['shop_name'] = $request->shop_name;
     	$data['account_holder'] = $request->account_holder;
     	$data['account_number'] = $request->account_number;
     	$data['bank_name'] = $request->bank_name;
     	$data['bank_branch'] = $request->bank_branch;
     	$data['city'] = $request->city;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $data['photo']=$image_url;
          $employee=DB::table('customers')->insert($data); 
         if ($employee) {
                $notification=array(
                'messege'=>'Customer Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Customer Does not Added ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	return Redirect()->back();
       }
    }else{
      return Redirect()->back();
     }
     	
      
      }

       public function Customers(){
        $customers=DB::table('customers')->orderBy('id','DESC')->get();
        return view('all_customer')->with('customers',$customers);
      }
       public function DeleteCustomer($id){
    	$del = DB::table('customers')->where('id',$id)->first();
    	$image = $del->photo;
    	unlink($image);
    	$deluser = DB::table('customers')->where('id',$id)->delete();
    	if($deluser){
    		 $notification=array(
                'messege'=>'Customer Deleted Successfully ! ',
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



     public function ViewCustomer($id){
        $customer=DB::table('customers')->where('id',$id)->first();
        return view('view_customer')->with('customer',$customer);

    }

     public function EditCustomer($id){
        $customer=DB::table('customers')->where('id',$id)->first();
        return view('edit_customer')->with('customer',$customer);

    }
     public function Update(Request $request,$id){
 	   $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        
         ]);
     	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['shop_name'] = $request->shop_name;
     	$data['account_holder'] = $request->account_holder;
     	$data['account_number'] = $request->account_number;
     	$data['bank_name'] = $request->bank_name;
     	$data['bank_branch'] = $request->bank_branch;
     	$data['city'] = $request->city;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('customers')->where('id',$id)->first();
	      $image_path = $del->photo;
	      unlink($image_path);
          $data['photo']=$image_url;
          $customer=DB::table('customers')->where('id',$id)->update($data); 
         if ($customer) {
                $notification=array(
                'messege'=>'Customer Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Customer Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
       	$customer=DB::table('customers')->where('id',$id)->update($data);
       	if($customer){
       		$notification=array(
                'messege'=>'Customer Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('all.customer')->with($notification);
       }else{

        	$notification=array(
            'messege'=>'Customer Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }

    }
}
