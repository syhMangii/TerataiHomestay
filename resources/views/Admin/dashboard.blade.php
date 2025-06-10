@include('Include.appadmin')
<br><br><br>
<div class="container mt-4">
    <h2 class="mb-4">Dashboard for Users under <strong>{{ $clinicName }}</strong></h2>

    <!-- Displaying Totals -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow p-3 text-center">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers > 0 ? $totalUsers : 'N/A' }}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 text-center">
                <h5>Total Quit Users</h5>
                <h2>{{ $totalQuitUsers > 0 ? $totalQuitUsers : 'N/A' }}</h2>
            </div>
        </div>
    </div>

    <div class="card shadow p-3 mt-4">
    <h5>Users Per School</h5>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>School</th>
                <th>User Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->users_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card shadow p-3 mt-4">
    <h5>Check-Ins Per Day</h5>
    <canvas id="checkInsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('checkInsChart').getContext('2d');
    const checkInsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($checkInLabels) !!},
            datasets: [
                {
                    label: 'Not Smoke (Green)',
                    data: {!! json_encode($greenCounts) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                },
                {
                    label: 'Smoke (Red)',
                    data: {!! json_encode($redCounts) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { stacked: true },
                y: { stacked: true, beginAtZero: true }
            }
        }
    });
</script>

