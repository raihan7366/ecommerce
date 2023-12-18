<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::paginate(10);
        return view('backend.categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data=new Category();
            $data->name_en=$request->categoriesName_en;
            $data->subcatname_en=$request->subcategoriesName_en;

            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/categories'), $imageName);
                $data->image=$imageName;
            }

            if($data->save())
                return redirect()->route('categories.index')->with('success','Successfully saved');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::findOrFail(encryptor('decrypt',$id));
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            {
                try{
                    $data=Category::findOrFail(encryptor('decrypt',$id));
                    $data->name_en=$request->categoriesName_en;
                    
        
                    if($request->hasFile('image')){
                        $imageName = rand(111,999).time().'.'.$request->image->extension();
                        $request->image->move(public_path('uploads/categories'), $imageName);
                        $data->image=$imageName;
                    }
        
                    if($data->save())
                        return redirect()->route('categories.index')->with('success','Successfully saved');
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
            $category= Category::findorFail(encryptor('decrypt',$id));
            $image_path=public_path('uploads/categories/').$category->image;
    
            if($category->delete()){
                if(File::exists($image_path))
                File::delete($image_path);
                return redirect()->back();
            }
        }
    }
}