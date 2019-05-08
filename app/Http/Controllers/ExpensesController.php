<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpensesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_expense');
    }
  public function Store(Request $request){
    	$data = array();
     	$data['detail'] = $request->detail;
     	$data['ammount'] = $request->ammount;
     	$data['month'] = $request->month;
     	$data['date'] = $request->date;
     	$data['year'] = $request->year;
        $expenses=DB::table('expenses')->insert($data); 
         if ($expenses) {
                $notification=array(
                'messege'=>'Expense Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('today.expense')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Expense Does not Added ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            }
     	
      
      }
      public function TodayExpense(){
      	$date = date("d-m-y");
      	$today = DB::table('expenses')->where('date',$date)->get();
    	return view('today_expense')->with('today',$today);
    }
     public function EditTdyExpense($id){
      	$today = DB::table('expenses')->where('id',$id)->first();
    	return view('edit_today_expense')->with('today',$today);
    }
        public function UpdateToday(Request $request,$id){
     	$data = array();
     	$data['detail'] = $request->detail;
     	$data['ammount'] = $request->ammount;
        $expenses=DB::table('expenses')->where('id',$id)->update($data); 
         if ($expenses) {
                $notification=array(
                'messege'=>'Expense Updated Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('home')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Expense Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            }


        }

   public function MonthlyExpense(){
      	$month = date("F");
       
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function YearlyExpense(){
      	$year = date("Y");
      	$year_expense = DB::table('expenses')->where('year',$year)->get();
    	return view('yearly_expense')->with('year_expense',$year_expense);
    }
    public function January(){
      	$month = "January";
       
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function February(){
      	$month = "February";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function March(){
      	$month = "March";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function April(){
      	$month = "April";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function May(){
      	$month = "May";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function June(){
      	$month = "June";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function July(){
      	$month = "July";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function August(){
      	$month = "August";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function September(){
      	$month = "September";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function October(){
      	$month = "October";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function November(){
      	$month = "November";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
    public function December(){
      	$month = "December";
        
      	$month_expense = DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_expense',compact('month_expense','month'));
    }
}
