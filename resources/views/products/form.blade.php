@extends('layouts.app')

@section('content')
    <div class="form-card">
        <form method="POST" action="{{ $product->exists ? route('products.update', $product) : route('products.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($product->exists) @method('PUT') @endif

            <h2>{{ $heading }}</h2>
            <p class="subtle">Keep product details and inventory up to date.</p>

            <label>Product name
                <input name="name" value="{{ old('name', $product->name) }}" required maxlength="100">
            </label>
            <div class="form-grid">
                <label>Price
                    <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" required>
                </label>
                <label>Stock quantity
                    <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}" required>
                </label>
            </div>
            <label>Product image
                <input type="file" name="image" accept="image/*">
                <small>JPG, PNG or WEBP up to 2 MB.</small>
            </label>
            <div class="form-actions">
                <a class="button secondary" href="{{ route('products.index') }}">Cancel</a>
                <button class="button primary">Save product</button>
            </div>
        </form>
    </div>
@endsection
