<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_catagory');
    }
     public function Store(Request $request){
    	$data = array();
     	$data['cat_name'] = $request->cat_name;
          $catagories=DB::table('catagories')->insert($data); 
         if ($catagories) {
                $notification=array(
                'messege'=>'Catagory Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.catagory')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Catagory Does not Added ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
     	
      
      }
       public function ViewCatagory(){
        $Catagory=DB::table('catagories')->orderBy('id','DESC')->get();
        return view('all_catagory')->with('Catagory',$Catagory);
      }
}
