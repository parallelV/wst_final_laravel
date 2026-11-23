@extends('layouts.app')

@section('topbar')
    <a class="button primary" href="{{ route('staff.create') }}">+ Add staff</a>
@endsection

@section('content')
    <div class="section-head"><div><p class="eyebrow">TEAM</p><h2>Staff members</h2></div></div>
    <div class="table-card">
        <table>
            <thead><tr><th>Name</th><th>Username</th><th>Joined</th><th></th></tr></thead>
            <tbody>
                @forelse ($staff as $member)
                    <tr>
                        <td><strong>{{ $member->full_name }}</strong></td>
                        <td>{{ '@' . $member->username }}</td>
                        <td>{{ $member->created_at?->format('d M Y') }}</td>
                        <td class="actions">
                            <a href="{{ route('staff.edit', $member) }}">Edit</a>
                            <form method="POST" action="{{ route('staff.destroy', $member) }}">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this staff member?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="empty">No staff members yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $staff->links() }}
@endsection
