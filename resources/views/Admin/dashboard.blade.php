@include('Include.appadmin')

<div class="container mt-4">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Displaying Totals -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers > 0 ? $totalUsers : 'N/A' }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h5>Total Check-Ins</h5>
                <h2>{{ $totalCheckIns > 0 ? $totalCheckIns : 'N/A' }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h5>Total Score Histories</h5>
                <h2>{{ $totalScoreHistories > 0 ? $totalScoreHistories : 'N/A' }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h5>Total Quit Users</h5>
                <h2>{{ $totalQuitUsers > 0 ? $totalQuitUsers : 'N/A' }}</h2>
            </div>
        </div>
    </div>

    <!-- Displaying Chart -->
    <div class="card shadow p-3">
        <h5>Check-Ins Per Month</h5>
        <canvas id="checkInsChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('checkInsChart').getContext('2d');
    const checkInsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($checkInsPerMonth->toArray())) !!},
            datasets: [{
                label: 'Check-Ins',
                data: {!! json_encode(array_values($checkInsPerMonth->toArray())) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>
