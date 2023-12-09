<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Exception;
use File;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $data=OrderDetails::paginate(10);
            return view('backend.orderDetails.index',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            try{
                $data=new OrderDetails();
                $data->product_name=$request->productsName_en;
                $data->product_category=$request->productsCategory;
                $data->product_brand=$request->productsBrand;
                $data->order_discount=$request->orderDiscount;
                $data->order_total_amount=$request->orderTotal_amount;
                $data->order_sub_amount=$request->orderSub_amount;
                $data->price=$request->price;
                $data->quantity=$request->quantity;
                

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image->extension();
                    $request->image->move(public_path('uploads/orderdetails'), $imageName);
                    $data->image=$imageName;
                }
    
                if($data->save())
                    return redirect()->route('orderDetails.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
            }
            catch(Exception $e){
                dd($e);
                return redirect()->back()->withInput()->with('error','Please try again');
            }
        
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::get();
        $brand=Brand::get();
        $product=Product::get();
        $order=Order::get();
        $orderDetails=OrderDetails::findOrFail(encryptor('decrypt',$id));
        return view('backend.orderDetails.edit',compact('product','category','brand','order','orderDetails'));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, string $id)
    {
        {
            try{
                $data=OrderDetails::findOrFail(encryptor('decrypt',$id));
                $data->product_name=$request->productsName_en;
                $data->product_category=$request->productsCategory;
                $data->product_brand=$request->productsBrand;
                $data->order_discount=$request->orderDiscount;
                $data->order_total_amount=$request->orderTotal_amount;
                $data->order_sub_amount=$request->orderSub_amount;
                $data->price=$request->price;
                $data->quantity=$request->quantity;
                

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image->extension();
                    $request->image->move(public_path('uploads/orderdetails'), $imageName);
                    $data->image=$imageName;
                }
    
                if($data->save())
                    return redirect()->route('orderDetails.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
            }
            catch(Exception $e){
                dd($e);
                return redirect()->back()->withInput()->with('error','Please try again');
            }
        
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $orderDetails= OrderDetails::findorFail(encryptor('decrypt',$id));
            $image_path=public_path('uploads/orderdetails/').$orderDetails->image;
    
            if($orderDetails->delete()){
                if(File::exists($image_path))
                File::delete($image_path);
                return redirect()->back();
            }
        }
    }
}
