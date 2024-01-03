<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list($subcat)
    {
        $product=Product::where('subcategory_id',$subcat)->get();
        $data=array();
        if($product){
            foreach($product as $p){
                $data[]=array(
                    'id'=>$p->id,
                    'name_en'=>$p->name_en,
                    'price'=>$p->price,
                    'image'=>asset('public/uploads/products/'.$p->image),
                );
            }
            return response($data, 200);
        }else{
            $msg=array('No Product found');
            return response($msg, 204);
        }

    }

    
}