<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return redirect()->route('login');
});
// Email Varification
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inbox', 'HomeController@Inbox')->name('inbox')->middleware('verified');
Route::get('/calendar', 'HomeController@Calendar')->name('calendar');
Route::get('/typography', 'HomeController@Typography')->name('typography');

// employee route 
Route::get('/add-employee', 'EmployeeController@Index')->name('add.employee');
Route::post('/insert-employee', 'EmployeeController@Store');
Route::get('/all-employee', 'EmployeeController@Employees')->name('all.employee');
Route::get('/delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::get('/view-employee/{id}','EmployeeController@ViewEmployee');
Route::get('/edit-employee/{id}','EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@Update');

// customers route are here 
Route::get('/add-customer', 'CustomerController@Index')->name('add.customer');
Route::get('/all-customer', 'CustomerController@Customers')->name('all.customer');
Route::post('/insert-customer', 'CustomerController@Store');
Route::get('/delete-customer/{id}','CustomerController@DeleteCustomer');
Route::get('/view-customer/{id}','CustomerController@ViewCustomer');
Route::get('/edit-customer/{id}','CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@Update');

// Suplier Route are here 
Route::get('/add-supplier', 'SupplierController@Index')->name('add.supplier');
Route::get('/all-supplier', 'SupplierController@Suppliers')->name('all.supplier');
Route::post('/insert-supplier', 'SupplierController@Store');
Route::get('/delete-supplier/{id}','SupplierController@DeleteSupplier');
Route::get('/view-supplier/{id}','SupplierController@ViewSupplier');
Route::get('/edit-supplier/{id}','SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@Update');

// Salary route are here 
Route::get('/add-advance-salary', 'SalaryController@Index')->name('add.advance.salary');
Route::get('/all-advance-salary', 'SalaryController@ViewAdvanceSalary')->name('all.advance.salary');
Route::post('/insert-advance-salary', 'SalaryController@AdvanceStore');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');

// Catagory rote are here!
Route::get('/add-catagory', 'CatagoryController@Index')->name('add.catagory');
Route::get('/all-catagory', 'CatagoryController@ViewCatagory')->name('all.catagory');
Route::post('/insert-catagory', 'CatagoryController@Store');

// Product Route are here 
Route::get('/add-product', 'ProductController@Index')->name('add.product');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::post('/insert-product', 'ProductController@Store');
Route::get('/delete-product/{id}','ProductController@DeleteProduct');
Route::get('/view-product/{id}','ProductController@ViewProduct');
Route::get('/edit-product/{id}','ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@Update');

// Inmport product route are here
Route::get('/import-product', 'ProductController@ProductImport')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import');



// Expense route are here
Route::get('/add-expense', 'ExpensesController@Index')->name('add.expense');
Route::post('/insert-expense', 'ExpensesController@Store');
Route::get('/today-expense', 'ExpensesController@TodayExpense')->name('today.expense');
Route::get('/edit-tdyexpense/{id}','ExpensesController@EditTdyExpense');
Route::post('/update-today/{id}', 'ExpensesController@UpdateToday');
Route::get('/monthly-expense', 'ExpensesController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpensesController@YearlyExpense')->name('yearly.expense');

// Monthly Expense route
Route::get('/January-expense', 'ExpensesController@January')->name('January.expense');
Route::get('/February-expense', 'ExpensesController@February')->name('February.expense');
Route::get('/March-expense', 'ExpensesController@March')->name('March.expense');
Route::get('/April-expense', 'ExpensesController@April')->name('April.expense');
Route::get('/May-expense', 'ExpensesController@May')->name('May.expense');
Route::get('/June-expense', 'ExpensesController@June')->name('June.expense');
Route::get('/July-expense', 'ExpensesController@July')->name('July.expense');
Route::get('/August-expense', 'ExpensesController@August')->name('August.expense');
Route::get('/September-expense', 'ExpensesController@September')->name('September.expense');
Route::get('/October-expense', 'ExpensesController@October')->name('October.expense');
Route::get('/November-expense', 'ExpensesController@November')->name('November.expense');
Route::get('/December-expense', 'ExpensesController@December')->name('December.expense');

// Attendence route are here
Route::get('/take-attendence', 'AttendeceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence', 'AttendeceController@InsertAttendence');
Route::get('/all-attendence', 'AttendeceController@AllAttendence')->name('all.attendence');
Route::get('/edit-attendence/{att_date}', 'AttendeceController@EditAttendence');
Route::post('/update-attendence', 'AttendeceController@UpdateAttendence');
Route::get('/view-attendence/{att_date}', 'AttendeceController@ViewAttendence');

// Setting route are here
Route::get('/website-setting', 'SettingsController@Setting')->name('website.setting');
Route::post('/update-website/{id}', 'SettingsController@Update');

// pos route are here
Route::get('/pos', 'PosController@Index')->name('pos');

//Cart route are here
Route::post('/add-cart', 'CartController@AddCart');
Route::post('/cat-update/{rowId}', 'CartController@UpdateCart');
Route::get('/cart-remove/{rowId}', 'CartController@RemoveCart');
Route::post('/create-invoice', 'CartController@CreateInvoice');
// Route::get('/invoice', 'CartController@Invoice')->name('invoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');

//Order route are here
Route::get('/pending-orders', 'PosController@PendingOrder')->name('pending.orders');
Route::get('/view-order-status/{id}', 'PosController@ViewOrder');
Route::get('/order-done/{id}', 'PosController@DoneOrder');
Route::get('/success-orders', 'PosController@SuccessOrder')->name('success.orders');


