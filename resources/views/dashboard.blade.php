@extends('layouts.app')

@section('content')
    <div class="stats">
        <div class="stat">
            <span class="stat-icon orange"><img src="{{ asset('images/icons/catalog.png') }}" alt="" onerror="this.removeAttribute('src')"></span>
            <div><small>Games in catalog</small><strong>{{ $productCount }}</strong></div>
        </div>
        <div class="stat">
            <span class="stat-icon blue"><img src="{{ asset('images/icons/customers.png') }}" alt="" onerror="this.removeAttribute('src')"></span>
            <div><small>Customers</small><strong>{{ $customerCount }}</strong></div>
        </div>
        <div class="stat">
            <span class="stat-icon purple"><img src="{{ asset('images/icons/staff.png') }}" alt="" onerror="this.removeAttribute('src')"></span>
            <div><small>Staff members</small><strong>{{ $staffCount }}</strong></div>
        </div>
        <div class="stat">
            <span class="stat-icon green"><img src="{{ asset('images/icons/history.png') }}" alt="" onerror="this.removeAttribute('src')"></span>
            <div><small>Transactions</small><strong>{{ $salesCount }}</strong></div>
        </div>
    </div>

    <div class="section-head">
        <div>
            <p class="eyebrow">ACTIVITY</p>
            <h2>Recent transactions</h2>
        </div>
        <a class="button secondary" href="{{ route('sales.index') }}">View history &#8594;</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr><th>Product</th><th>Customer</th><th>Staff</th><th>Qty</th><th>Total</th><th>Date</th></tr>
            </thead>
            <tbody>
                @forelse ($recentSales as $sale)
                    <tr>
                        <td><strong>{{ $sale->product->name }}</strong></td>
                        <td>{{ $sale->customer?->full_name ?? 'Walk-in customer' }}</td>
                        <td>{{ $sale->staff->full_name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td class="money">&#8369;{{ number_format($sale->total_price, 2) }}</td>
                        <td>{{ $sale->created_at?->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No sales recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
