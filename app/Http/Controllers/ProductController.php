<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'name' => ['nullable', 'string', 'max:100'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0', 'gte:min_price'],
            'min_stock' => ['nullable', 'integer', 'min:0'],
            'max_stock' => ['nullable', 'integer', 'min:0', 'gte:min_stock'],
        ]);

        $products = Product::query()
            ->when(filled($filters['name'] ?? null), fn ($query) => $query->where('name', 'like', '%' . $filters['name'] . '%'))
            ->when(filled($filters['min_price'] ?? null), fn ($query) => $query->where('price', '>=', $filters['min_price']))
            ->when(filled($filters['max_price'] ?? null), fn ($query) => $query->where('price', '<=', $filters['max_price']))
            ->when(filled($filters['min_stock'] ?? null), fn ($query) => $query->where('stock_quantity', '>=', $filters['min_stock']))
            ->when(filled($filters['max_stock'] ?? null), fn ($query) => $query->where('stock_quantity', '<=', $filters['max_stock']))
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }
    public function create() { return view('products.form', ['product' => new Product(), 'heading' => 'Add product']); }
    public function store(Request $request) { $product = new Product(); $this->save($request, $product); return redirect()->route('products.index')->with('success', 'Product added.'); }
    public function edit(Product $product) { return view('products.form', compact('product') + ['heading' => 'Edit product']); }
    public function update(Request $request, Product $product) { $this->save($request, $product); return redirect()->route('products.index')->with('success', 'Product updated.'); }
    public function destroy(Product $product) { if ($product->sales()->exists()) return back()->with('error', 'This product has sales and cannot be deleted.'); if ($product->image) Storage::disk('public')->delete($product->image); $product->delete(); return back()->with('success', 'Product deleted.'); }
    private function save(Request $request, Product $product): void
    {
        $data = $request->validate(['name' => ['required','string','max:100'], 'price' => ['required','numeric','min:0'], 'stock_quantity' => ['required','integer','min:0'], 'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048']]);
        if ($request->hasFile('image')) { if ($product->image) Storage::disk('public')->delete($product->image); $data['image'] = $request->file('image')->store('products', 'public'); }
        $product->fill($data)->save();
    }
}
