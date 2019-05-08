<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index(){
    	return view('add_product');
    }
    public function AllProduct(){
        $product=DB::table('products')->orderBy('id','DESC')->get();
        return view('all_product')->with('product',$product);
      }
      public function Store(Request $request){
        $validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'cat_id' => 'required|max:255',
        'sup_id' => 'required',
        'product_code' => 'required|unique:products|max:255',
        'buying_price' => 'required',
        'selling_price' => 'required',
        'product_image' => 'required',
        
         ]);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image=$request->file('product_image');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Products/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $data['product_image']=$image_url;
          $Product=DB::table('products')->insert($data); 
         if ($Product) {
                $notification=array(
                'messege'=>'Product Added Successfully ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Product Does not Added ! ',
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

      public function DeleteProduct($id){
        $del = DB::table('products')->where('id',$id)->first();
        $image = $del->product_image;
        unlink($image);
        $deluser = DB::table('products')->where('id',$id)->delete();
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
    public function ViewProduct($id){
        $products=DB::table('products')
        ->join('suppliers','products.sup_id','suppliers.id')
        ->join('catagories','products.cat_id','catagories.id')
        ->select('products.*','suppliers.name','catagories.cat_name')
        ->where('products.id',$id)
        ->first();
        return view('view_product')->with('product',$products);

    }
    public function EditProduct($id){
        $products=DB::table('products')->where('id',$id)->first();
        return view('edit_product')->with('product',$products);

    }
    public function Update(Request $request,$id){
       $validatedData = $request->validate([
        'product_name' => 'required|max:255',
        'cat_id' => 'required|max:255',
        'sup_id' => 'required',
        'product_code' => 'required',
        'buying_price' => 'required',
        'selling_price' => 'required',
        
         ]);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['cat_id'] = $request->cat_id;
        $data['sup_id'] = $request->sup_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image=$request->file('product_image');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Products/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $del = DB::table('products')->where('id',$id)->first();
          $image_path = $del->product_image;
          unlink($image_path);
          $data['product_image']=$image_url;
          $Product=DB::table('products')->where('id',$id)->update($data); 
         if ($Product) {
                $notification=array(
                'messege'=>'Product Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('home')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Product Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
         return Redirect()->back();
       }
    }else{
        $Product=DB::table('products')->where('id',$id)->update($data);
        if($Product){
            $notification=array(
                'messege'=>'Product Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('home')->with($notification);
       }else{

            $notification=array(
            'messege'=>'Product Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }

    }

    public function ProductImport(){
      return view('import_product');
    }
    public function export() 
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
    public function import(Request $request) 
    {
        $import = Excel::import(new ProductsImport, $request->file('import_file'));
        if($import){
          $notification=array(
                'messege'=>'Product Import Successfully ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('all.product')->with($notification);
        }else{

            $notification=array(
            'messege'=>'Product Does not Import ! ',
            'alert-type'=>'error');
        return Redirect()->route('all.product')->with($notification);
             }
        
       
    }
}
