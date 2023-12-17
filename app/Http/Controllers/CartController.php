<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        return view('frontend.product.index', compact('products', 'category'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('frontend.cart.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $message = "You have already added this product in your cart.";
            return redirect()->back()->with('warning', $message);
            // $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name_en" => $product->name_en,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
            session()->put('cart', $cart);
            $this->cart_total();
            $message = "Product added to cart successfully!";
            return redirect()->back()->with('success', $message);
        }

        // session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $this->cart_total();
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $this->cart_total();
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function cart_total()
    {
        $total = 0;
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $total += $details['price'] * $details['quantity'];
            }
        }
        if (isset(session('cart_details')['coupon_code'])) {
            $cart_total = $total;
            $discount = ($cart_total * (session('cart_details')['discount'] / 100));
            $tax = (($cart_total - $discount) * 0.15);
            $total_amount = (($cart_total + $tax) - $discount);
            $coupondata = array(
                'cart_total' => $cart_total,
                'coupon_code' => session('cart_details')['coupon_code'],
                'discount' => session('cart_details')['discount'],
                'discount_amount' => $discount,
                'tax' => $tax,
                'total_amount' => $total_amount
            );
            session()->put('cart_details', $coupondata);
        } else {
            $cart_data = array('cart_total' => $total, 'tax' => ($total * 0.15), 'total_amount' => ($total + ($total * 0.15)));
            session()->put('cart_details', $cart_data);
        }
    }

    public function coupon_check(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)
            ->where('valid_from', '<=', date('Y-m-d'))
            ->where('valid_until', '>=', date('Y-m-d'))
            ->pluck('discount')->toArray();

        if (!empty($coupon)) {
            $cart_total = session('cart_details')['cart_total'];
            $discount = ($cart_total * ($coupon[0] / 100));
            $tax = (($cart_total - $discount) * 0.15);
            $total_amount = (($cart_total + $tax) - $discount);
            $coupondata = array(
                'cart_total' => $cart_total,
                'coupon_code' => $request->coupon,
                'discount' => $coupon[0],
                'discount_amount' => $discount,
                'tax' => $tax,
                'total_amount' => $total_amount
            );
            session()->put('cart_details', $coupondata);
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
