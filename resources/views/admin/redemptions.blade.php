@extends('adminlte::page')

@section('title', 'Redemption Requests')

@section('content_header')
    <h1>Redemption Requests</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Requests</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Reward</th>
                    <th>Points</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($redemptions as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->reward->title }}</td>
                        <td>{{ $item->points_used }}</td>
                        <td>{{ $item->redeem_code }}</td>
                        <td>
                            <span class="badge badge-{{ $item->status == 'pending' ? 'warning' : ($item->status == 'approved' ? 'success' : 'danger') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>
                            @if($item->status == 'pending')
                                <form action="{{ route('admin.approve', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Approve</button>
                                </form>

                                <form action="{{ route('admin.reject', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>No action</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@stop
