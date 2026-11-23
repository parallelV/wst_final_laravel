@extends('layouts.app')

@section('content')
    <div class="form-card">
        <form method="POST" action="{{ $customer->exists ? route('customers.update', $customer) : route('customers.store') }}">
            @csrf
            @if ($customer->exists) @method('PUT') @endif

            <h2>{{ $heading }}</h2>
            <p class="subtle">Customer information is optional at checkout, but useful for history.</p>
            <label>Full name
                <input name="full_name" value="{{ old('full_name', $customer->full_name) }}" required maxlength="100">
            </label>
            <label>Email
                <input type="email" name="email" value="{{ old('email', $customer->email) }}" required maxlength="100">
            </label>
            <label>Phone
                <input name="phone" value="{{ old('phone', $customer->phone) }}" maxlength="20">
            </label>
            <div class="form-actions">
                <a class="button secondary" href="{{ route('customers.index') }}">Cancel</a>
                <button class="button primary">Save customer</button>
            </div>
        </form>
    </div>
@endsection
