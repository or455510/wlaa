<h3>Points: {{ $totalPoints }}</h3>
<h4>Tier: {{ $tier }}</h4>

<table>
    <tr>
        <th>Activity</th>
        <th>Points</th>
        <th>Date</th>
    </tr>
    @foreach($activities as $act)
    <tr>
        <td>{{ $act->activity }}</td>
        <td>{{ $act->points }}</td>
        <td>{{ $act->created_at->format('Y-m-d') }}</td>
    </tr>
    @endforeach
</table>
@extends('admin.layouts.app')
@section('content')
    <h1>Loyalty Points</h1>
    <h3>Points: {{ $totalPoints }}</h3>

    <h4>Tier: {{ $tier }}</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Activity</th>
                <th>Points</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $act)
            <tr>
                <td>{{ $act->activity }}</td>
                <td>{{ $act->points }}</td>
                <td>{{ $act->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
