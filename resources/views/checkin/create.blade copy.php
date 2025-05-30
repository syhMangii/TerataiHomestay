@include('Include.app')
<script>
document.addEventListener("DOMContentLoaded", function () {
    @if (!$activeQuitDate)
        var quitDateModal = new bootstrap.Modal(document.getElementById('quitDateModal'));
        quitDateModal.show();
    @endif
});
</script>

<hr>
<div class="nk-content">
    <div class="container">
    <div class="container my-4">
        <div class="row justify-content-center g-3">
            <!-- Daily Score Card -->
            <div class="col-6 col-md-4 order-1">
                <div class="card text-center shadow-sm bg-primary text-white border border-2 border-white">
                    <div class="card-body">
                        <i class="bi bi-calendar2-check fs-1 mb-2"></i> {{-- ✅ Calendar Check Icon --}}
                        <h6 class="card-title">Daily Score</h6>
                        <p class="card-text fs-6">{{ $dailyScore }}</p>
                    </div>
                </div>
            </div>

            <!-- Streak Score Card -->
            <div class="col-6 col-md-4 order-2">
                <div class="card text-center shadow-sm bg-success text-white border border-2 border-white">
                    <div class="card-body">
                        <i class="bi bi-fire fs-1 mb-2"></i> {{-- 🔥 Fire for streaks --}}
                        <h6 class="card-title">Streak Score</h6>
                        <p class="card-text fs-6">{{ $streakScore }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Score Card -->
            <div class="col-6 col-md-4 order-3">
                <div class="card text-center shadow-sm bg-warning text-white border border-2 border-white">
                    <div class="card-body">
                        <i class="bi bi-bar-chart-line fs-1 mb-2"></i> {{-- 📊 Chart icon --}}
                        <h6 class="card-title">Total Score</h6>
                        <p class="card-text fs-6">{{ $totalScore }}</p>
                    </div>
                </div>
            </div>

            <!-- Quit Date Card -->
            <div class="col-6 col-md-4 order-4">
                <div class="card text-center shadow-sm bg-info text-white border border-2 border-white">
                    <div class="card-body">
                        <i class="bi bi-person-x fs-1 mb-2"></i> {{-- 🚭 Icon idea --}}
                        <h6 class="card-title">Quit Date</h6>

                        @if ($activeQuitDate)
                            <p class="card-text fs-6">{{ \Carbon\Carbon::parse($activeQuitDate->quit_date)->format('d M Y') }}</p>
                        @elseif ($lastInactiveQuitDate)
                            <!-- <p class="card-text fs-6">Last Quit: {{ \Carbon\Carbon::parse($lastInactiveQuitDate->quit_date)->format('d M Y') }}</p> -->
                            <button class="btn btn-light btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#quitDateModal">
                                Set New Quit Date
                            </button>
                        @else
                            <!-- <p class="card-text fs-6">No quit date set</p> -->
                            <button class="btn btn-light btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#quitDateModal">
                                Set Quit Date
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quit Date Modal -->
<div class="modal fade" id="quitDateModal" tabindex="-1" aria-labelledby="quitDateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color:#0d1b2a">
            <form method="POST" action="{{ route('quit-dates.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="quitDateModalLabel">Set Your Quit Smoking Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <label for="quit_date" class="form-label">Choose your quit date</label>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <input type="date" id="quit_date" name="quit_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Later</button>
                <button type="submit" class="btn btn-primary">Save</button>                </div>
            </form>
        </div>
    </div>
</div>



    </div>
</div>

<hr>

        <div id="checkinAlert" class="alert d-none mx-3 text-center" role="alert" style="max-width: 500px; margin: 0 auto;"></div>
        <div class="nk-content-inner justify-content-center">
            <div class="nk-content-body d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 40vh;">
                <h2 class="text-center mb-4">Your Smoking Tracker Progress</h2>
                <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
    <div class="d-flex align-items-center gap-1">
        <span class="rounded-circle" style="width: 15px; height: 15px; background-color: #712a2a; display: inline-block;"></span>
        <small class="text-white">Smoking</small>
    </div>
    <div class="d-flex align-items-center gap-1">
        <span class="rounded-circle" style="width: 15px; height: 15px; background-color: #065127; display: inline-block;"></span>
        <small class="text-white">Not Smoking</small>
    </div>
</div><p>

                <!-- Progress Bar
                <div class="w-100 w-md-50 px-2 mb-4">
                    <div class="progress">
                        @foreach ($last7Days as $day)
                            @php
                                $colorClass = $day['status'] === 111 ? 'text-bg-danger' : ($day['status'] === 222 ? 'text-bg-success' : 'text-bg-secondary');
                                $label = $day['status'] === 111 ? 'Smoke' : ($day['status'] === 222 ? 'Not Smoke' : '');
                            @endphp
                            <div class="progress-bar {{ $colorClass }}" style="width: 14.28%" role="progressbar">
                                <span class="d-none d-md-inline">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div> -->

                @php
    // Build conic gradient parts
    $segments = [];
    $colors = [
        111 => '#712a2a',    // red for "Smoke"
        222 => '#065127',    // green for "Not Smoke"
        'default' => '#adb5bd' // gray for other
    ];
    $segmentSize = 100 / 7;
    foreach ($last7Days as $index => $day) {
        $start = $index * $segmentSize;
        $end = $start + $segmentSize;
        $status = $day['status'];
        $color = $colors[$status] ?? $colors['default'];
        $segments[] = "$color $start% $end%";
    }
    $gradient = implode(', ', $segments);
@endphp

<div role="progressbar" style="--segments: {{ $gradient }}">
  <div class="center-label"><h5 style="color: white;">Week: {{ $weekCount }}<br> Streak: {{ $maxStreak }}</h5></div>
</div>
<br>

                <!-- Check-In Button -->
                @if ($hasCheckedInToday)
                    <button style="color: white; type="button" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#alreadyCheckedModal" disabled>Checked-In</button>
                @else
                    <button type="button" class="btn btn-primary btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#smokeModal">
                        Daily Check-In
                    </button>
                @endif
            </div>
            <hr>
        </div>
    </div>
</div>

<!-- Sponsor Section -->
<div class="text-center mt-2 mb-3">
<figure>
  <blockquote class="blockquote">
  <p>Enjoy Rewards Powered </p>
  </blockquote>
  <figcaption class="blockquote-footer">
    <cite title="Source Title">by Zus Coffee</cite>
  </figcaption>
</figure>
    <img src="zus-logo.png" alt="Zus Coffee Logo" class="img-fluid" style="max-height: 180px;">
</div>

<!-- Modal -->
<div class="modal fade" id="smokeModal" tabindex="-1" aria-labelledby="smokeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color:#0d1b2a">
            <div class="modal-header">
                <h5 class="modal-title" id="smokeModalLabel">Today's Check-In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Did you smoke today?</p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <button type="button" class="btn btn-danger" id="btn-smoke">Yes, I smoked</button>
                    <button type="button" class="btn btn-success" id="btn-no-smoke">No, I didn't</button>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@include('Include.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('btn-smoke').addEventListener('click', function () {
        sendCheckIn(111); // Smoke
    });

    document.getElementById('btn-no-smoke').addEventListener('click', function () {
        sendCheckIn(222); // Not Smoke
    });

    function sendCheckIn(actionId) {
    fetch("{{ route('checkin.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": '{{ csrf_token() }}',
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ action_id: actionId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
    const alertBox = document.getElementById("checkinAlert");
    alertBox.classList.remove("d-none", "alert-danger", "alert-warning");
    alertBox.classList.add("alert", "alert-success");
    alertBox.innerHTML = data.message;

    // Optionally hide the alert after 3 seconds
    setTimeout(() => {
        alertBox.classList.add("d-none");
    }, 5000);
}

        // Hide the modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('smokeModal'));
        modal.hide();

        // Reload the page after a short delay to ensure modal hides properly
        setTimeout(() => {
            location.reload();
        }, 500);
    })
    .catch(error => console.error('Error:', error));
}

});
</script>
