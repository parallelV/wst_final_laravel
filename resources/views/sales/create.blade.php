@extends('layouts.app')

@section('content')
    <div class="form-card sale-form">
        <form method="POST" action="{{ route('sales.store') }}">
            @csrf

            <h2>Record a sale</h2>
            <p class="subtle">Choose an in-stock product. Inventory updates as soon as the sale is saved.</p>
            <label>Product
                <select name="product_id" required>
                    <option value="">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                            {{ $product->name }} - &#8369;{{ number_format($product->price, 2) }} - {{ $product->stock_quantity }} in stock
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Customer <span class="subtle">(optional)</span>
                <select name="customer_id">
                    <option value="">Walk-in customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>
                            {{ $customer->full_name }} - {{ $customer->email }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>Quantity
                <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" required>
            </label>
            <div class="form-actions">
                <a class="button secondary" href="{{ route('dashboard') }}">Cancel</a>
                <button class="button primary">Complete sale &#8594;</button>
            </div>
        </form>
    </div>
@endsection
