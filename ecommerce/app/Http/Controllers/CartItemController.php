<?php


namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\Middleware;

class CartItemController extends Controller
{
    public function index()
    {
        // Adicionar filtro por usuário autenticado
        $itens = CartItem::with('produto')
                  ->where('user_id', Auth::id())
                  ->get();
                  
        return response()->json($itens);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            // outros campos necessários
        ]);
        
        // Adiciona o user_id automaticamente
        
        
        $cartItem = CartItem::create([
            ...$validated,'user_id' => Auth::id()
        ]);
        return response()->json($cartItem->load('produto'), 201);
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
                      ->findOrFail($id);
                      
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cartItem->update($validated);
        return response()->json($cartItem->fresh('produto'));
    }

    public function destroy($id)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
                      ->findOrFail($id);
                      
        $cartItem->delete();
        return response()->json(['message' => 'Item removido do carrinho'], 200);
    }

}