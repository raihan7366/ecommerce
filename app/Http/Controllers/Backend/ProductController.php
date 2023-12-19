<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Illuminate\Http\Request;
use Exception;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::paginate(10);
        $category = Category::get();
        $subcategory = Subcategory::get();
        return view('backend.products.index',compact('data','category','subcategory'));
    }

    public function frontIndex()
    {
        $products = Product::paginate(10);
        $category = Category::get();
        $subcategory = Subcategory::get();
        return view('frontend.product.index', compact('products', 'category','subcategory'));
    }

     public function homeIndex()
    {
        $products = Product::paginate(10);
        $category = Category::get();
        $subcategory = Subcategory::get();
        return view('frontend.home.index', compact('products', 'category','subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::get();
        $subcategory=Subcategory::get();
        $brand=Brand::get();
        return view('backend.products.create',compact('category','brand','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            try{
                $data=new Product();
                $data->name_en=$request->productsName_en;
                $data->description=$request->description;
                $data->short_description=$request->shortDescription;
                $data->category_id=$request->categoryId;
                $data->subcategory_id=$request->subcategoryId;
                $data->brand_id=$request->brandId;
                $data->price=$request->price;
                $data->discount_type=$request->discountType;
                $data->discount_amount=$request->discountAmount;
                $data->is_popular=$request->isPopular;
                $data->is_featured=$request->isFeatured;

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image->extension();
                    $request->image->move(public_path('uploads/products'), $imageName);
                    $data->image=$imageName;
                }
    
                if($data->save())
                    return redirect()->route('products.index')->with('success','Successfully saved');
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
        $category=Category::get();
        $subcategory=Subcategory::get();
        $brand=Brand::get();
        $product=Product::findOrFail(encryptor('decrypt',$id));
        return view('backend.products.edit',compact('product','category','brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            try{
                $data=Product::findOrFail(encryptor('decrypt',$id));
                $data->name_en=$request->productsName_en;
                $data->description=$request->description;
                $data->short_description=$request->shortDescription;
                $data->category_id=$request->categoryId;
                $data->subcategory_id=$request->subcategoryId;
                $data->brand_id=$request->brandId;
                $data->price=$request->price;
                $data->discount_type=$request->discountType;
                $data->discount_amount=$request->discountAmount;
                $data->is_popular=$request->isPopular;
                $data->is_featured=$request->isFeatured;

                if($request->hasFile('image')){
                    $imageName = rand(111,999).time().'.'.$request->image->extension();
                    $request->image->move(public_path('uploads/products'), $imageName);
                    $data->image=$imageName;
                }

                if($data->save())
                    return redirect()->route('products.index')->with('success','Successfully saved');
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
        $product= Product::findorFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/products/').$product->image;

        if($product->delete()){
            if(File::exists($image_path))
            File::delete($image_path);
            return redirect()->back();
        }
    }
}