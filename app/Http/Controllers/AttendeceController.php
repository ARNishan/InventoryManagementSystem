<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AttendeceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function TakeAttendence(){
    	$user = DB::table('employees')->get();
    	return view('take_attendence')->with('user',$user);
    }
   public function InsertAttendence(Request $request){
   	$date = $request->att_date;
   	$att_date = DB::table('attendences')->where('att_date',$date)->first();
   	if($att_date){
   		$notification=array(
                'messege'=>'Today Attendence Already Been Taken',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);

   	}else{
   	foreach ($request->user_id as $id) {
   		$data[]=[
   			"user_id" => $id,
   			"attendence" => $request->attendence[$id],
   			"att_date" => $request->att_date,
   			"att_year" => $request->att_year,
   			"edit_date" => date("d_m_y")
   		];
   		# code...
   	}
   	$attendence=DB::table('attendences')->insert($data); 
   	 if ($attendence) {
                $notification=array(
                'messege'=>'Attendence Inserted Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Attendence Didnot Inserte ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
     	
      
      }
  }

      public function AllAttendence(){
    	$attendence = DB::table('attendences')->select('att_date')->groupBy('att_date')->get();
    	return view('all_attendence')->with('attendence',$attendence);
    }
     public function EditAttendence($att_date){
     	$date = DB::table('attendences')->where('att_date',$att_date)->first();

    	$attendence = DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('employees.name','employees.photo','attendences.*')
    	->where('att_date',$att_date)->get();
    	return view('edit_attendence',compact('attendence','date'));
    }

       public function UpdateAttendence(Request $request){
       $check = 0;
   	   foreach ($request->id as $id) {
   		$data=[
   			"attendence" => $request->attendence[$id],
   			"att_date" => $request->att_date,
   			"att_year" => $request->att_year,
   			"edit_date" => date("d_m_y")
   		];
   		$update=DB::table('attendences')->where('id',$id)->update($data);
   		if($update){
   			$check = 1;
   		} 
   	}
   	// return $request->all();
   	 if ($check) {
                $notification=array(
                'messege'=>'Attendence Updated Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.attendence')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Attendence Didnot Updated ! ',
                'alert-type'=>'error');
              return Redirect()->route('all.attendence')->with($notification);
            }

     	
      
      
  }

  public function ViewAttendence($att_date){
     	$date = DB::table('attendences')->where('att_date',$att_date)->first();

    	$attendence = DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('employees.name','employees.photo','attendences.*')
    	->where('att_date',$att_date)->get();
    	return view('view_attendence',compact('attendence','date'));
    }
}
