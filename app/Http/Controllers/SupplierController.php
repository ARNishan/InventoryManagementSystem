<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_supplier');
    }
       public function Store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers|max:255',
        'phone' => 'required',
        'address' => 'required',
        'photo' => 'required',
        
         ]);
    	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['type'] = $request->type;
     	$data['shop_name'] = $request->shop_name;
     	$data['account_holder'] = $request->account_holder;
     	$data['account_number'] = $request->account_number;
     	$data['bank_name'] = $request->bank_name;
     	$data['bank_branch'] = $request->bank_branch;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $data['photo']=$image_url;
          $supplier=DB::table('suppliers')->insert($data); 
         if ($supplier) {
                $notification=array(
                'messege'=>'Supplier Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Supplier Does not Added ! ',
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

       public function Suppliers(){
        $suppliers=DB::table('suppliers')->orderBy('id','DESC')->get();
        return view('all_supplier')->with('suppliers',$suppliers);
      }
       public function DeleteSupplier($id){
    	$del = DB::table('suppliers')->where('id',$id)->first();
    	$image = $del->photo;
    	unlink($image);
    	$deluser = DB::table('suppliers')->where('id',$id)->delete();
    	if($deluser){
    		 $notification=array(
                'messege'=>'Supplier Deleted Successfully ! ',
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



     public function ViewSupplier($id){
        $supplier=DB::table('suppliers')->where('id',$id)->first();
        return view('view_supplier')->with('supplier',$supplier);

    }

     public function EditSupplier($id){
        $supplier=DB::table('suppliers')->where('id',$id)->first();
        return view('edit_supplier')->with('supplier',$supplier);

    }
     public function Update(Request $request,$id){
 	   $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required',
        'address' => 'required',
        
         ]);
     	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['type'] = $request->type;
     	$data['shop_name'] = $request->shop_name;
     	$data['account_holder'] = $request->account_holder;
     	$data['account_number'] = $request->account_number;
     	$data['bank_name'] = $request->bank_name;
     	$data['bank_branch'] = $request->bank_branch;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('suppliers')->where('id',$id)->first();
	      $image_path = $del->photo;
	      unlink($image_path);
          $data['photo']=$image_url;
          $supplier=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($supplier) {
                $notification=array(
                'messege'=>'Supplier Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Supplier Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
       	$supplier=DB::table('suppliers')->where('id',$id)->update($data);
       	if($supplier){
       		$notification=array(
                'messege'=>'Supplier Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('all.supplier')->with($notification);
       }else{

        	$notification=array(
            'messege'=>'Supplier Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }

    }
}
