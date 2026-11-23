<?php

namespace App\Http\Controllers;

use App\Models\{Customer, Product, Sale};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index() { return view('sales.index', ['sales' => Sale::with(['product','customer','staff'])->latest('created_at')->paginate(15)]); }
    public function create() { return view('sales.create', ['products'=>Product::where('stock_quantity','>',0)->orderBy('name')->get(), 'customers'=>Customer::orderBy('full_name')->get()]); }
    public function store(Request $request)
    {
        $data = $request->validate(['product_id'=>['required','exists:products,id'],'customer_id'=>['nullable','exists:customers,id'],'quantity'=>['required','integer','min:1']]);
        try { DB::transaction(function () use ($data) { $product = Product::whereKey($data['product_id'])->lockForUpdate()->firstOrFail(); if ($data['quantity'] > $product->stock_quantity) throw new \RuntimeException('Only '.$product->stock_quantity.' unit(s) of '.$product->name.' remain in stock.'); Sale::create(['product_id'=>$product->id,'customer_id'=>$data['customer_id'] ?? null,'sold_by'=>auth()->id(),'quantity'=>$data['quantity'],'total_price'=>bcmul((string)$product->price,(string)$data['quantity'],2)]); $product->decrement('stock_quantity',$data['quantity']); }); } catch (\RuntimeException $e) { return back()->withInput()->withErrors(['quantity'=>$e->getMessage()]); }
        return redirect()->route('sales.index')->with('success', 'Sale recorded and inventory updated.');
    }
}
