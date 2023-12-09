<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;
use Exception;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Brand::paginate(10);
        return view('backend.brands.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data=new Brand();
            $data->name_en=$request->brandsName_en;

            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/brands'), $imageName);
                $data->image=$imageName;
            }

            if($data->save())
                return redirect()->route('brands.index')->with('success','Successfully saved');
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
    public function show(Brand $brand)
    {
        $brand=Brand::findOrFail(encryptor('decrypt',$id));
        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand=Brand::findOrFail(encryptor('decrypt',$id));
        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            {
                try{
                    $data=Brand::findOrFail(encryptor('decrypt',$id));
                    $data->name_en=$request->brandsName_en;
                    
        
                    if($request->hasFile('image')){
                        $imageName = rand(111,999).time().'.'.$request->image->extension();
                        $request->image->move(public_path('uploads/brands'), $imageName);
                        $data->image=$imageName;
                    }
        
                    if($data->save())
                        return redirect()->route('brands.index')->with('success','Successfully saved');
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
        {
            $brand= Brand::findorFail(encryptor('decrypt',$id));
            $image_path=public_path('uploads/brands/').$brand->image;
    
            if($brand->delete()){
                if(File::exists($image_path))
                File::delete($image_path);
                return redirect()->back();
            }
        }
    }
}
