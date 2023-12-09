<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use File;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Customers::paginate(10);
        return view('backend.customers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data=new Customers();
            $data->name_en=$request->customersName_en;
            $data->name_bn=$request->customersName_bn;
            $data->email=$request->EmailAddress;
            $data->contact_no_en=$request->contactNumber_en;
            $data->contact_no_bn=$request->contactNumber_bn;
            $data->status=$request->status;
            $data->address=$request->address;
            $data->shipping_address=$request->shippingAddress;
            $data->password=Hash::make($request->password);

            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/customers'), $imageName);
                $data->image=$imageName;
            }

            if($data->save())
                return redirect()->route('customers.index')->with('success','Successfully saved');
            else
                return redirect()->back()->withInput()->with('error','Please try again');
            
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with('error','Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $customers=Customers::findOrFail(encryptor('decrypt',$id));
        return view('backend.customers.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        {
            {
                try{
                    $data=Customers::findOrFail(encryptor('decrypt',$id));
                    $data->name_en=$request->customersName_en;
                    $data->name_bn=$request->customersName_bn;
                    $data->email=$request->EmailAddress;
                    $data->contact_no_en=$request->contactNumber_en;
                    $data->contact_no_bn=$request->contactNumber_bn;
                    $data->address=$request->address;
                    $data->shipping_address=$request->shippingAddress;
                    $data->status=$request->status;
        
                    if($request->password)
                        $data->password=Hash::make($request->password);
        
                    if($request->hasFile('image')){
                        $imageName = rand(111,999).time().'.'.$request->image->extension();
                        $request->image->move(public_path('uploads/customers'), $imageName);
                        $data->image=$imageName;
                    }
        
                    if($data->save())
                        return redirect()->route('customers.index')->with('success','Successfully saved');
                    else
                        return redirect()->back()->withInput()->with('error','Please try again');
                    
                }catch(Exception $e){
                    dd($e);
                    return redirect()->back()->withInput()->with('error','Please try again');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customers= Customers::findorFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/customers/').$customers->image;

        if($customers->delete()){
            if(File::exists($image_path))
            File::delete($image_path);
            return redirect()->back();
        }
    }
}
