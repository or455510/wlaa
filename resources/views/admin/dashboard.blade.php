@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <h2>Admin Dashboard</h2>

    <div class="row mt-4">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Users</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalRewards }}</h3>
                    <p>Total Rewards</p>
                </div>
                <div class="icon"><i class="fas fa-gift"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalRedemptions }}</h3>
                    <p>Total Redemptions</p>
                </div>
                <div class="icon"><i class="fas fa-history"></i></div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Redemption Status Chart</h3>
                </div>
                <div class="card-body">
                    <canvas id="redemptionChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('redemptionChart').getContext('2d');
    const redemptionChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Used', 'Expired'],
            datasets: [{
                label: 'Redemptions',
                data: [
                    {{ $chartData['pending'] }},
                    {{ $chartData['used'] }},
                    {{ $chartData['expired'] }}
                ],
                backgroundColor: ['#f39c12', '#28a745', '#dc3545'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
