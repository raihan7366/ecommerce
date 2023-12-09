<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Payment::paginate(10);
        return view('backend.payments.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customers::get();
        $payment=Payment::get();
        return view('backend.payment.create',compact('payment','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            try{
                $data=new Payment();
                $data->customer_name_en=$request->customerName_en;
                $data->customer_contact_no_en=$request->customerContact_no_en;
                $data->customer_email=$request->customerEmail;
                $data->transaction_no=$request->transactionNumber;
                $data->payment_type=$request->paymentType;
                $data->card_no=$request->cardNumber;
    
                if($data->save())
                    return redirect()->route('payments.index')->with('success','Successfully saved');
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
    public function show(Payment $payment)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $customers=Customers::get();
        $payment=Payment::findOrFail(encryptor('decrypt',$id));
        return view('backend.payments.edit',compact('customers','payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        {
            try{
                $data=Payment::findOrFail(encryptor('decrypt',$id));
                $data->name_en=$request->customersName_en;
                $data->contact_no_en=$request->customersContactNumber_en;
                $data->email=$request->customersEmailAddress;
                $data->transaction_no=$request->transactionNumber;
                $data->payment_type=$request->paymentType;
                $data->card_no=$request->cardNumber;
    
                if($data->save())
                    return redirect()->route('payments.index')->with('success','Successfully saved');
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
    public function destroy(Payment $payment)
    {
        $payment= Payment::findorFail(encryptor('decrypt',$id));

        if($product->delete()){
            
            return redirect()->back();
        }
    }
}
