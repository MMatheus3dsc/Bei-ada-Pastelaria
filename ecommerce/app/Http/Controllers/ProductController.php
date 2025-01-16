<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        return Product::all(); // Retorna todos os produtos como JSON
    }

    // Cria um novo produto
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201); // Retorna o produto criado
    }

    // Exibe um único produto
    public function show($id)
    {
        return Product::findOrFail($id); // Retorna o produto pelo ID
    }

    // Atualiza um produto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    // Remove um produto
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Produto deletado']);
    }
}