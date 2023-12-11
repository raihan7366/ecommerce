<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WishlistController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category= Category::all();
        return view('frontend.product.index', compact('products','category'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function wishlist()
    {
        return view('frontend.wishlist.index');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToWishlist($id)
    {
        $product = Product::findOrFail($id);
          
        $wishlist = session()->get('wishlist', []);
  
        if(isset($wishlist[$id])) {
            $wishlist[$id]['quantity']++;
        } else {
            $wishlist[$id] = [
                "name_en" => $product->name_en,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $wishlist = session()->get('wishlist');
            $wishlist[$request->id]["quantity"] = $request->quantity;
            session()->put('wishlist', $wishlist);
            session()->flash('success', 'Wishlist updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $wishlist = session()->get('wishlist');
            if(isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}