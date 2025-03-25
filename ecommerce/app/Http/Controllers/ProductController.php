<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lista todos os produtos
    public function index()
    {
        return response()->json(Product::all());
    }

    // Cria um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tratamento de upload de imagem
        $imagemNome = 'banner-beicada.jpg'; // Padrão
        if ($request->hasFile('imagem')) {
            $imagemNome = uniqid() . '.' . $request->file('imagem')->extension();
            $request->file('imagem')->storeAs('public/produtos', $imagemNome);
        }

        Product::create([
            'tipo' => $request->tipo,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $imagemNome,
        ]);

        return redirect('/admin')->with('success', 'Produto cadastrado com sucesso!');
    }

    // Exibe um único produto
    public function show($id)
    {
        return Product::findOrFail($id);
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
