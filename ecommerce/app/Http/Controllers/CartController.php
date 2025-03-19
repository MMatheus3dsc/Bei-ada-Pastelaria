<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Cart::updateOrCreate(
            [
                'session_id' => session()->getId(),
                'product_id' => $request->product_id
            ],
            ['quantity' => DB::raw("quantity + {$request->quantity}")]
        );
        
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function getCart()
    {
        $cart = Cart::where('session_id', session()->getId())->with('product')->get();
        return response()->json($cart);
    }

    public function removeFromCart($id)
    {
        Cart::where('id', $id)->delete();
        return response()->json(['success' => true]);
    }
}
