@extends('layouts.app')

@section('topbar')
    <a class="button primary" href="{{ route('sales.create') }}">+ Record sale</a>
@endsection

@section('content')
    <div class="section-head"><div><p class="eyebrow">TRANSACTIONS</p><h2>Sales history</h2></div></div>
    <div class="table-card">
        <table>
            <thead><tr><th>Product</th><th>Customer</th><th>Sold by</th><th>Qty</th><th>Total</th><th>Date</th></tr></thead>
            <tbody>
                @forelse ($sales as $sale)
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
    {{ $sales->links() }}
@endsection
