<?php


namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    // Lista todos os itens no carrinho
    public function index()
    {
        return CartItem::with('product')->get(); // Inclui informações do produto
    }

    // Adiciona um item ao carrinho
    public function store(Request $request)
    {
        $cartItem = CartItem::create($request->all());
        return response()->json($cartItem, 201);
    }

    // Atualiza a quantidade de um item no carrinho
    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->all());
        return response()->json($cartItem);
    }

    // Remove um item do carrinho
    public function destroy($id)
    {
        CartItem::destroy($id);
        return response()->json(['message' => 'Item removido do carrinho']);
    }
}
