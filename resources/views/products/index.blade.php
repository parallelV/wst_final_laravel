@extends('layouts.app')

@section('topbar')
    <a class="button primary" href="{{ route('products.create') }}">+ Add product</a>
@endsection

@section('content')
    <div class="section-head"><div><p class="eyebrow">CATALOG</p><h2>Products</h2></div></div>
    <form class="filter-card" method="GET" action="{{ route('products.index') }}">
        <div class="filter-heading">
            <div>
                <p class="eyebrow">FILTERS</p>
                <h3>Find products</h3>
            </div>
            @if (request()->hasAny(['name', 'min_price', 'max_price', 'min_stock', 'max_stock']))
                <a class="filter-reset" href="{{ route('products.index') }}">Clear filters</a>
            @endif
        </div>
        <div class="filter-grid">
            <label>Product name
                <input type="search" name="name" value="{{ request('name') }}" placeholder="Search by name">
            </label>
            <label>Price from
                <input type="number" name="min_price" value="{{ request('min_price') }}" min="0" step="0.01" placeholder="₱ Min">
            </label>
            <label>Price to
                <input type="number" name="max_price" value="{{ request('max_price') }}" min="0" step="0.01" placeholder="₱ Max">
            </label>
            <label>Stock from
                <input type="number" name="min_stock" value="{{ request('min_stock') }}" min="0" step="1" placeholder="Min units">
            </label>
            <label>Stock to
                <input type="number" name="max_stock" value="{{ request('max_stock') }}" min="0" step="1" placeholder="Max units">
            </label>
        </div>
        <div class="filter-actions">
            <button class="button primary" type="submit">Apply filters</button>
        </div>
    </form>
    <div class="table-card">
        <table>
            <thead><tr><th>Product</th><th>Price</th><th>In stock</th><th>Added</th><th></th></tr></thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td class="money">&#8369;{{ number_format($product->price, 2) }}</td>
                        <td><span class="pill {{ $product->stock_quantity < 10 ? 'warning' : 'good' }}">{{ $product->stock_quantity }} units</span></td>
                        <td>{{ $product->created_at?->format('d M Y') }}</td>
                        <td class="actions">
                            <a href="{{ route('products.edit', $product) }}">Edit</a>
                            <form method="POST" action="{{ route('products.destroy', $product) }}">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty">No products yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $products->links('vendor.pagination.tailwind') }}
@endsection
