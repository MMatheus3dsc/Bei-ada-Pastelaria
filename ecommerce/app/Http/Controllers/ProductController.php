<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lista todos os produtos (GET /produtos)
    public function index()
    {
        $produtos = Product::all();
        return view('produtos.index', compact('produtos'));
    }

    // Mostra formulário de criação (GET /produtos/create)
    public function create()
    {
        return view('produtos.create');
    }

    // Armazena novo produto (POST /produtos)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string',
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|numeric'
        ]);

        $imagemNome = 'banner-beicada.jpg';
        if ($request->hasFile('imagem')) {
            $imagemNome = uniqid() . '.' . $request->file('imagem')->extension();
            $request->file('imagem')->storeAs('public/produtos', $imagemNome);
        }

        Product::create(array_merge($validated, ['imagem' => $imagemNome]));

        return redirect()->route('admin.produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    // Mostra um produto específico (GET /produtos/{id})
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.produtos.show', compact('product'));
    }

    // Mostra formulário de edição (GET /produtos/{id}/edit)
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.produtos.edit', compact('product'));
    }

    // Atualiza um produto (PUT/PATCH /produtos/{id})
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'tipo' => 'required|string',
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|numeric'
        ]);

        if ($request->hasFile('imagem')) {
            $imagemNome = uniqid() . '.' . $request->file('imagem')->extension();
            $request->file('imagem')->storeAs('public/produtos', $imagemNome);
            $validated['imagem'] = $imagemNome;
        }

        $product->update($validated);

        return redirect()->route('admin.produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Remove um produto (DELETE /produtos/{id})
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin.produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
