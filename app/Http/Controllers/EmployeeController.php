<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_employee');
    }
   public function Store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required',
        'address' => 'required',
        'photo' => 'required',
        'nid' => 'required|unique:employees|max:255',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        
         ]);
    	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['experience'] = $request->experience;
     	$data['nid'] = $request->nid;
     	$data['salary'] = $request->salary;
     	$data['vacation'] = $request->vacation;
     	$data['city'] = $request->city;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $data['photo']=$image_url;
          $employee=DB::table('employees')->insert($data); 
         if ($employee) {
                $notification=array(
                'messege'=>'Employee Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Employee Does not Added ! ',
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
 public function Employees(){
        $employees=DB::table('employees')->orderBy('id','DESC')->get();
        return view('all_employee')->with('employees',$employees);
      }
 public function DeleteEmployee($id){
    	$del = DB::table('employees')->where('id',$id)->first();
    	$image = $del->photo;
    	unlink($image);
    	$deluser = DB::table('employees')->where('id',$id)->delete();
    	if($deluser){
    		 $notification=array(
                'messege'=>'Employee Deleted Successfully ! ',
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
 public function ViewEmployee($id){
        $employees=DB::table('employees')->where('id',$id)->first();
        return view('Employee')->with('employee',$employees);

    }
 public function EditEmployee($id){
        $employees=DB::table('employees')->where('id',$id)->first();
        return view('edit_employee')->with('employee',$employees);

    }
 public function Update(Request $request,$id){
 	   $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required',
        'address' => 'required',
        'nid' => 'required|max:255',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        
         ]);
     	$data = array();
     	$data['name'] = $request->name;
     	$data['email'] = $request->email;
     	$data['phone'] = $request->phone;
     	$data['address'] = $request->address;
     	$data['experience'] = $request->experience;
     	$data['nid'] = $request->nid;
     	$data['salary'] = $request->salary;
     	$data['vacation'] = $request->vacation;
     	$data['city'] = $request->city;
     	$image=$request->file('photo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('employees')->where('id',$id)->first();
	      $image_path = $del->photo;
	      unlink($image_path);
          $data['photo']=$image_url;
          $employee=DB::table('employees')->where('id',$id)->update($data); 
         if ($employee) {
                $notification=array(
                'messege'=>'Employee Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Employee Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
       	$employee=DB::table('employees')->where('id',$id)->update($data);
       	if($employee){
       		$notification=array(
                'messege'=>'Employee Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('all.employee')->with($notification);
       }else{

        	$notification=array(
            'messege'=>'Employee Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }

    }

        
    
   
}
