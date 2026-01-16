@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <h2 class="mb-4">Redemptions Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Reward</th>
                        <th>Points Used</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($redemptions as $redeem)
                    <tr>
                        <td>{{ $redeem->id }}</td>
                        <td>{{ $redeem->user->name ?? 'N/A' }}</td>
                        <td>{{ $redeem->reward->title ?? 'N/A' }}</td>
                        <td>{{ $redeem->points_used }}</td>
                        <td>{{ $redeem->redeem_code }}</td>
                        <td>
                            <span class="badge
                                @if($redeem->status == 'pending') badge-warning
                                @elseif($redeem->status == 'used') badge-success
                                @elseif($redeem->status == 'expired') badge-danger
                                @endif">
                                {{ ucfirst($redeem->status) }}
                            </span>
                        </td>
<td>
    {{ $redeem->created_at ? $redeem->created_at->format('Y-m-d') : '-' }}
</td>
                        <td>
                            <a href="{{ route('redemptions.edit', $redeem->id) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('redemptions.destroy', $redeem->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No redemptions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
