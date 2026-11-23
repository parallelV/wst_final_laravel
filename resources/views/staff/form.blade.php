@extends('layouts.app')

@section('content')
    <div class="form-card">
        <form method="POST" action="{{ $member->exists ? route('staff.update', $member) : route('staff.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($member->exists) @method('PUT') @endif

            <h2>{{ $heading }}</h2>
            <p class="subtle">Passwords are hashed before they are stored.</p>
            <label>Full name
                <input name="full_name" value="{{ old('full_name', $member->full_name) }}" required maxlength="100">
            </label>
            <label>Username
                <input name="username" value="{{ old('username', $member->username) }}" required maxlength="50">
            </label>
            <div class="form-grid">
                <label>Password
                    <input type="password" name="password" {{ $member->exists ? '' : 'required' }} minlength="8">
                    <small>{{ $member->exists ? 'Leave blank to keep current password.' : 'At least 8 characters.' }}</small>
                </label>
                <label>Confirm password
                    <input type="password" name="password_confirmation" {{ $member->exists ? '' : 'required' }} minlength="8">
                </label>
            </div>
            <label>Avatar
                <input type="file" name="avatar" accept="image/*">
                <small>JPG, PNG or WEBP up to 2 MB.</small>
            </label>
            <div class="form-actions">
                <a class="button secondary" href="{{ route('staff.index') }}">Cancel</a>
                <button class="button primary">Save staff member</button>
            </div>
        </form>
    </div>
@endsection
