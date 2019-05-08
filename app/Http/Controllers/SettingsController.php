<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Setting(){
    	$set = DB::table('settings')->first();
    	return view('setting')->with('set',$set);
    	// echo "<pre>";
    	// print_r($set);
    	// exit();
    }
  public function Update(Request $request,$id){
 	   $validatedData = $request->validate([
        'comphany_name' => 'required|max:255',
        'comphany_address' => 'required',
        'comphany_email' => 'required',
        'comphany_phone' => 'required',
        // 'comphany_logo' => 'required',
        'comphany_city' => 'required',
        'comphany_country' => 'required',
        'comphany_zipcode' => 'required',
        
         ]);
     	$data = array();
     	$data['comphany_name'] = $request->comphany_name;
     	$data['comphany_address'] = $request->comphany_address;
     	$data['comphany_email'] = $request->comphany_email;
     	$data['comphany_phone'] = $request->comphany_phone;
     	$data['comphany_city'] = $request->comphany_city;
     	$data['comphany_country'] = $request->comphany_country;
     	$data['comphany_zipcode'] = $request->comphany_zipcode;
     	$image=$request->file('comphany_logo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Comphany/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('settings')->where('id',$id)->first();
	      $image_path = $del->comphany_logo;
	      unlink($image_path);
          $data['comphany_logo']=$image_url;
          $employee=DB::table('settings')->where('id',$id)->update($data); 
         if ($employee) {
                $notification=array(
                'messege'=>'Comphany Information Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Comphany Information Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
       	$employee=DB::table('settings')->where('id',$id)->update($data);
       	if($employee){
       		$notification=array(
                'messege'=>'Comphany Information Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
       }else{

        	$notification=array(
            'messege'=>'Comphany Information Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }

    }
}
