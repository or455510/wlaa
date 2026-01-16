@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Your Redemption History</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Reward</th>
                    <th>Points Used</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($redemptions as $redeem)
                    <tr>
                        <td>{{ $redeem->reward->title }}</td>
                        <td>{{ $redeem->points_used }}</td>
                        <td>{{ $redeem->redeem_code }}</td>
                        <td>{{ ucfirst($redeem->status) }}</td>
                        <td>{{ $redeem->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
