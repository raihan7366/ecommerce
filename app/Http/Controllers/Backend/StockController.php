<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;
use File;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Stock::paginate(10);
        return view('backend.stocks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=Product::get();
        $order=Order::get();
        return view('backend.stocks.create',compact('product','order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            try{
                $data=new Stock();
                $data->product_name_en=$request->productsName_en;
                $data->total_quantity=$request->totalQuantity;
                $data->order_quantity=$request->orderQuantity;
                $data->buying_price=$request->buyingPrice;
                $data->selling_price=$request->sellingPrice;
                
    
                if($data->save())
                    return redirect()->route('stocks.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
                
            }catch(Exception $e){
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
        $product=Product::get();
        $order=Order::get();
        $stock=Stock::findOrFail(encryptor('decrypt',$id));
        return view('backend.stocks.edit',compact('product','order','stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            try{
                $data=Stock::findOrFail(encryptor('decrypt',$id));
                $data->product_id=$request->productsName_en;
                $data->total_quantity=$request->totalQuantity;
                $data->order_id=$request->orderedQuantity;
                $data->buying_price=$request->buyingPrice;
                $data->selling_price=$request->sellingPrice;
                

                if($data->save())
                    return redirect()->route('stocks.index')->with('success','Successfully saved');
                else
                    return redirect()->back()->withInput()->with('error','Please try again');
                
            }catch(Exception $e){
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
        $stock= Stock::findorFail(encryptor('decrypt',$id));
        
        if($stock->delete()){
            
            return redirect()->back();
        }
    }
}
