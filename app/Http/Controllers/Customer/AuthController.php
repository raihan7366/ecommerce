<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Customers;
use App\Http\Requests\Customer\SignupRequest;
use App\Http\Requests\Customer\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function signUpForm(){
        return view('Customer.Auth.register');
    }

    public function signUpStore(SignupRequest $request){
        try{
            $customers=new Customers;
            $customers->name_en=$request->name_en;
            $customers->email=$request->email;
            $customers->password=Hash::make($request->password);
            if($customers->save())
                return redirect()->route('customerLogin')->with('success','Successfully Registred');
            else
                return redirect()->route('customerLogin')->with('danger','Please try again');
        }catch(Exception $e){
            dd($e);
            return redirect()->route('customerLogin')->with('danger','Please try again');;
        }

    }

    public function signInForm(){
        return view('Customer.Auth.login');
    }

    public function signInCheck(SigninRequest $request){
        try{
            $customers=Customers::where('email',$request->email)->first();
            if($customers){
                if($customers->status==1){
                    if(Hash::check($request->password , $customers->password)){
                        $this->setSession($customers);
                        return redirect()->route('home')->with('success','Successfully login');
                    }else
                        return redirect()->route('customerLogin')->with('error','Your phone number or password is wrong!');
                }else
                    return redirect()->route('customerLogin')->with('error','You are not active Customers. Please contact to authority!');
        }else
                return redirect()->route('customerLogin')->with('error','Your phone number or password is wrong!');
        }catch(Exception $e){
            dd($e);
            return redirect()->route('customerLogin')->with('error','Your phone number or password is wrong!');
        }
    }

    public function setSession($customers){
        return request()->session()->put([
                'CustomersId'=>encryptor('encrypt',$customers->id),
                'CustomersName'=>encryptor('encrypt',$customers->name_en),
                'CustomersEmail'=>encryptor('encrypt',$customers->email),
                'customerLogin' => 1,
                'image'=>$customers->image ?? 'no-image.png'
            ]
        );
    }

    public function signOut(){
        request()->session()->flush();
        return redirect()->route('customerLogin')->with('danger','Succfully Logged Out');
    }
}
