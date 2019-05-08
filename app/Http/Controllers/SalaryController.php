<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_advance_salary');
    }
    //All advance salary view here
     public function ViewAdvanceSalary(){
     	$salary = DB::table('advance_salary')
     	->join('employees','advance_salary.emp_id','employees.id')
     	->select('advance_salary.*','employees.name','employees.salary','employees.photo')
        ->orderBy('id','DESC')
     	->get();

    	return view('all_advance_salary')->with('salary',$salary);
    }
    public function AdvanceStore(Request $request){
    	$emp_id = $request->emp_id;
    	$month = $request->month;
    	$advance_salary = DB::table('advance_salary')
    	->where('emp_id',$emp_id)
    	->where('month',$month)
    	->first();
    	if($advance_salary === NULL){
        $validatedData = $request->validate([
        'emp_id' => 'required|max:255',
        'month' => 'required|max:255',
        'year' => 'required',
        'advance_salary' => 'required',
         ]);
    	$data = array();
     	$data['emp_id'] = $request->emp_id;
     	$data['month'] = $request->month;
     	$data['year'] = $request->year;
     	$data['advance_salary'] = $request->advance_salary;
        $salary=DB::table('advance_salary')->insert($data); 
         if ($salary) {
                $notification=array(
                'messege'=>'Advance Salary Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all_advance_salary')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Advance Salary Does not Added ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
        }else{
        	$notification=array(
                'messege'=>'Oopss! Already Advance Paid in this Month!!',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);

        }
       }

       public function PaySalary(){
     //   	$month = date("F",strtotime('-1 month'));
    	// $salary = DB::table('advance_salary')
     // 	->join('employees','advance_salary.emp_id','employees.id')
     // 	->select('advance_salary.*','employees.name','employees.salary','employees.photo')
     //    ->where('month',$month)
     // 	->get();
       	  $emp = DB::Table('employees')->get();

    	return view('pay_salary')->with('emp',$emp);
    }
    
     
     	
      
      

}
