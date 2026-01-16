@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Redemption</h2>

        <form action="{{ route('redemptions.update', $redeem) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>User</label>
                <input type="text" class="form-control" value="{{ $redeem->user->name ?? 'N/A' }}" disabled>
            </div>

            <div class="mb-3">
                <label>Reward</label>
                <input type="text" class="form-control" value="{{ $redeem->reward->title ?? 'N/A' }}" disabled>
            </div>

            <div class="mb-3">
                <label>Points Used</label>
                <input type="text" class="form-control" value="{{ $redeem->points_used }}" disabled>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                    <option value="pending" {{ $redeem->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="used" {{ $redeem->status == 'used' ? 'selected' : '' }}>Used</option>
                    <option value="expired" {{ $redeem->status == 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('redemptions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
