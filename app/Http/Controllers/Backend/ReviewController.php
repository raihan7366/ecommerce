<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Exception;
use File;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Review::paginate(10);
        return view('backend.reviews.index',compact('data'));
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
                $data=new Review();
                $data->product_name_en=$request->productName_en;
                $data->product_image=$request->productImage;
                $data->name_en=$request->nameEn;
                $data->email=$request->email;
                $data->contact_no_en=$request->contactNo_en;
                $data->comment=$request->comment;
                $data->ratings=$request->ratings;

                if($data->save())
                    return redirect()->route('reviews.index')->with('success','Successfully saved');
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
        {
            $product=Product::get();
            $review=Review::findOrFail(encryptor('decrypt',$id));
            return view('backend.reviews.edit',compact('product','review'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        {
            try{
                $data=Review::findOrFail(encryptor('decrypt',$id));
                $data->product_name_en=$request->productName_en;
                $data->product_image=$request->productImage;
                $data->user_name_en=$request->userName_En;
                $data->email=$request->email;
                $data->contact_no_en=$request->contactNo_en;
                $data->comment=$request->comment;
                $data->ratings=$request->ratings;

                if($data->save())
                    return redirect()->route('reviews.index')->with('success','Successfully saved');
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
        $review= Review::findorFail(encryptor('decrypt',$id));

        if($review->delete()){
        
            return redirect()->back();
        }
    }
}
