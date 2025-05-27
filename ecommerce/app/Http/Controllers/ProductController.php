<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function home()
{
    $salgados = Product::where('type', 'salgado')
                      ->orderBy('name')
                      ->get();
                      
    $doces = Product::where('type', 'doce')
                   ->orderBy('name')
                   ->get();
                   
    return view('pages.home', compact('salgados', 'doces'));
}
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
         $products = Product::all();
        return view('admin.products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        
        try {
            $validated['image'] = $this->handleImageUpload($request);
            Product::create($validated);
            
            return redirect()->route('admin.products.index')
                            ->with('success', 'Produto cadastrado com sucesso!');
        } catch (\Exception $e) {
            if (isset($validated['image'])) {
                Storage::disk('public')->delete($validated['image']);
            }
            
            return back()->withInput()
                        ->with('error', 'Erro ao cadastrar produto: '.$e->getMessage());
        }
    }

    public function show(Product $product)
    {
         $products = Product::all();
        return view('admin.products.show', compact('products'));
    }

    public function edit(Product $product)
    {
        // $products = Product::all();
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
         
        $validated = $this->validateProduct($request);
        
        try {
            $validated['image'] = $this->handleImageUpload($request, $product);
            $product->update($validated);
            
            return redirect()->route('admin.products.index')
                            ->with('success', 'Produto atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->withInput()
                        ->with('error', 'Erro ao atualizar produto: '.$e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
            
            return redirect()->route('admin.products.index')
                            ->with('success', 'Produto excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir produto: '.$e->getMessage());
        }
    }

    private function validateProduct(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:'.Product::validTypes(),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0'
        ]);
    }

    private function handleImageUpload(Request $request, Product $product = null)
    {
        if ($request->hasFile('image')) {
            if ($product && $product->image) {
                Storage::disk('public')->delete($product->image);
            }
            return $request->file('image')->store('products', 'public');
        }
        return $product->image ?? null;
    }
}