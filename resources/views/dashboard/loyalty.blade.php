@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">Loyalty Dashboard</h2>
        <span class="badge bg-warning text-dark fs-6">
    Level: {{ ucfirst(auth()->user()->loyalty_level) }}
</span>

        <span class="badge bg-primary fs-5">
            Total Points: {{ auth()->user()->totalPoints() }}
        </span>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Points Card --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Loyalty Points</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('loyalty.add') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Activity</label>
                    <input type="text" name="activity" class="form-control" placeholder="e.g., purchase, share, referral" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Points</label>
                    <input type="number" name="points" value="10" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary px-4">Add Points</button>
            </form>
        </div>
    </div>

    {{-- Activities Table --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Activity History</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Activity</th>
                        <th>Points</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse(auth()->user()->loyaltyPoints as $point)
                    <tr>
                        <td>{{ $point->id }}</td>
                        <td>{{ ucfirst($point->activity) }}</td>
                        <td>
                            <span class="badge bg-success">{{ $point->points }}</span>
                        </td>
                        <td>{{ $point->created_at->format('d M, Y - h:i A') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center p-4 text-muted">
                            No activities yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
