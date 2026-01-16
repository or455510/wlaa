@extends('layouts.app')
<style>
    .loyalty-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.loyalty-table th,
.loyalty-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: center;
}

.loyalty-table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

.loyalty-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.loyalty-table tr:hover {
    background-color: #f1f1f1;
}

.loyalty-container {
    padding: 120px 20px 50px 20px; /* مساحة أعلى أكبر عشان navbar */
    max-width: 900px;
    margin: 0 auto;
}

.loyalty-container h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    text-align: center;
    color: #007bff;
}

.loyalty-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.loyalty-table thead {
    background: #007bff;
    color: #fff;
}

.loyalty-table th,
.loyalty-table td {
    padding: 12px 15px;
    text-align: left;
}

.loyalty-table tbody tr:nth-child(even) {
    background: #f9f9f9;
}

.loyalty-table tbody tr:hover {
    background: #e6f0ff;
}

.table-responsive {
    overflow-x: auto;
}

</style>

@section('content')
<div class="container" style="padding-top: 80px;">
    <h2 class="text-center">Your Loyalty Points: {{ $totalPoints }}</h2>

    @if($loyaltyPoints->count() > 0)
        <table class="loyalty-table">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Points</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loyaltyPoints as $point)
                    <tr>
                        <td>{{ $point->activity }}</td>
                        <td>{{ $point->points }}</td>
                        <td>{{ $point->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No loyalty points yet. Start earning points now!</p>
    @endif
</div>
@endsection

