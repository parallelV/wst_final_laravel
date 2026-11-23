@extends('layouts.app')

@section('topbar')
    <a class="button primary" href="{{ route('customers.create') }}">+ Add customer</a>
@endsection

@section('content')
    <div class="section-head"><div><p class="eyebrow">RELATIONSHIPS</p><h2>Customers</h2></div></div>
    <div class="table-card">
        <table>
            <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Added</th><th></th></tr></thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td><strong>{{ $customer->full_name }}</strong></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone ?: '-' }}</td>
                        <td>{{ $customer->created_at?->format('d M Y') }}</td>
                        <td class="actions">
                            <a href="{{ route('customers.edit', $customer) }}">Edit</a>
                            <form method="POST" action="{{ route('customers.destroy', $customer) }}">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty">No customers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $customers->links() }}
@endsection
