<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Exception;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Subcategory::paginate(10);
        return view('backend.subcategories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data=new Subcategory();
            $data->subcatname_en=$request->subcategoriesName_en;

            if($data->save())
                return redirect()->route('subcategories.index')->with('success','Successfully saved');
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
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory=Subcategory::findOrFail(encryptor('decrypt',$id));
        return view('backend.subcategories.edit',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            {
                try{
                    $data=Subcategory::findOrFail(encryptor('decrypt',$id));
                    $data->subcatname_en=$request->subcategoriesName_en;
                    
                    if($data->save())
                        return redirect()->route('subcategories.index')->with('success','Successfully saved');
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
        $subcategory= Subcategory::findorFail(encryptor('decrypt',$id));
    }
}