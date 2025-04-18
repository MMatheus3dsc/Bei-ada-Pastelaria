<?php



namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:'.Product::validTypes(),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0'
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('products', 'public');
            }
    
            Product::create($validated);
    
            return redirect()->route('products.index')
                            ->with('success', 'Produto cadastrado com sucesso!');
                            
        } catch (\Exception $e) {
            // Remove a imagem se foi upload mas falhou o cadastro
            if (isset($validated['image'])) {
                Storage::disk('public')->delete($validated['image']);
            }
            
            return back()->withInput()
                        ->with('error', 'Erro ao cadastrar produto: '.$e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:'.Product::validTypes(),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0'
        ]);
    
        try {
            if ($request->hasFile('image')) {
                // Remove imagem antiga
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $validated['image'] = $request->file('image')->store('products', 'public');
            }
    
            $product->update($validated);
    
            return redirect()->route('products.index')
                             ->with('success', 'Produto atualizado com sucesso!');
                             
        } catch (\Exception $e) {
            return back()->withInput()
                        ->with('error', 'Erro ao atualizar produto: '.$e->getMessage());
        }
    }
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}