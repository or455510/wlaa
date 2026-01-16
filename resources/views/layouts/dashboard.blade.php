@extends('layouts.app')
<style>
    table {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

</style>
@section('content')
<div class="container" style="margin-top:100px;">
    <h2>Your Loyalty Dashboard</h2>
    <p>Total Points: <strong>{{ $totalPoints }}</strong></p>

    @if($loyaltyPoints->isEmpty())
        <p>No points yet. Start earning points now!</p>
    @else
        <table style="width:100%; border-collapse: collapse; margin-top:20px;">
            <thead>
                <tr>
                    <th style="border-bottom:1px solid #ddd; padding:8px;">Activity</th>
                    <th style="border-bottom:1px solid #ddd; padding:8px;">Points</th>
                    <th style="border-bottom:1px solid #ddd; padding:8px;">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loyaltyPoints as $point)
                <tr>
                    <td style="border-bottom:1px solid #eee; padding:8px;">{{ $point->activity }}</td>
                    <td style="border-bottom:1px solid #eee; padding:8px;">{{ $point->points }}</td>
                    <td style="border-bottom:1px solid #eee; padding:8px;">{{ $point->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<canvas id="pointsChart" width="400" height="150"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('pointsChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($loyaltyPoints->pluck('activity')->unique()),
        datasets: [{
            label: 'Points per Activity',
            data: @json($loyaltyPoints->groupBy('activity')->map(fn($g)=>$g->sum('points'))),
            backgroundColor: '#007bff'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        }
    }
});
</script>

@endsection
