<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Exception;
use File;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Order::paginate(10);
        return view('backend.orders.index',compact('data'));
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
                $data=new Order();
                $data->customer_id=$request->customerId;
                $data->quantity=$request->quantity;
                $data->sub_amount=$request->subAmount;
                $data->discount=$request->discount;
                $data->total_amount=$request->totalAmount;
                $data->payment_status=$request->paymentStatus;
                $data->delivery_status=$request->deliveryStatus;
                $data->order_date=$request->orderDate;
                $data->delivery_date=$request->deliveryDate;
                
                if($data->save())
                    return redirect()->route('orders.index')->with('success','Successfully saved');
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order=Order::findOrFail(encryptor('decrypt',$id));
        return view('backend.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            try{
                $data=Order::findOrFail(encryptor('decrypt',$id));
                $data->delivery_status=$request->deliveryStatus;
                $data->delivery_date=$request->deliveryDate;
                if($data->save())
                    return redirect()->route('orders.index')->with('success','Successfully saved');
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
        {
            $order= Order::findorFail(encryptor('decrypt',$id));
            if($order->delete()){
                return redirect()->back();
            }
        }
    }
}
