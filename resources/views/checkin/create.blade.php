@include('Include.app')

<script>
document.addEventListener("DOMContentLoaded", function () {
    @if (!$activeQuitDate)
        var quitDateModal = new bootstrap.Modal(document.getElementById('quitDateModal'));
        quitDateModal.show();
    @endif
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    @if ($showFlipchartAlert)
        var flipchartModal = new bootstrap.Modal(document.getElementById('flipchartReminderModal'));
        flipchartModal.show();
    @endif
});
</script>

<style>
    .square-card {
        aspect-ratio: 1 / 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem;
    }

    .square-card .card-body {
        width: 100%;
        padding: 0.25rem;
    }

    .square-card i {
        font-size: 1.2rem; /* even smaller icon */
        margin-bottom: 0.3rem;
    }

    .square-card .card-title {
        font-size: 0.75rem; /* smaller title */
        margin: 0;
    }

    .square-card .card-text {
        font-size: 0.9rem; /* smaller number */
        margin: 0;
    }
</style>
@if(session('new_badges'))
    <!-- Badge Earned Modal -->
    <div class="modal fade" id="badgeEarnedModal" tabindex="-1" aria-labelledby="badgeEarnedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="badgeEarnedLabel">🎉 Badge Unlocked!</h5>
                </div>
                <div class="modal-body text-center text-black">
                    <p class="mb-3">You’ve earned the following badge{{ count(session('new_badges')) > 1 ? 's' : '' }}:</p>
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        @foreach(session('new_badges') as $badge)
                            <div class="text-center" style="max-width: 150px;">
                                <img src="{{ asset('badges/c/' . $badge->image_name) }}" alt="{{ $badge->name }}" class="img-thumbnail" style="width: 80px; height: 80px;">
                                <p class="mt-2 fw-bold mb-1 text-black">{{ $badge->name }}</p>
                                <small class="text-muted d-block">{{ $badge->description }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Awesome!</button>
                </div>
            </div>
        </div>
    </div>
@endif

<hr>
<div class="nk-content">
    <div class="container my-3 ">
        <div class="row justify-content-center g-3">
            <!-- Daily Score Card -->
            <div class="col-4 col-md-4 order-1">
                <div class="card square-card text-center shadow-sm bg-primary text-white border border-1 border-white">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-calendar2-check fs-1 mb-0"></i>
                        <p class="card-title text-nowrap">Check-in Score</p>
                        <p class="card-text fs-6">{{ $checkinScore }}</p>
                    </div>
                </div>
            </div>

            <!-- Streak Score Card -->
            <div class="col-4 col-md-4 order-2">
                <div class="card square-card text-center shadow-sm bg-success text-white border border-1 border-white">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-fire fs-1 mb-0"></i>
                        <p class="card-title">Streak Score</p>
                        <p class="card-text fs-6">{{ $streakScore }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Score Card -->
            <div class="col-4 col-md-4 order-3">
                <div class="card square-card text-center shadow-sm bg-warning text-white border border-1 border-white">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-bar-chart-line fs-1 mb-0"></i>
                        <p class="card-title">Total Score</p>
                        <p class="card-text fs-6">{{ $totalScore }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-0 mt-0 p-3">
            <!-- Quit Date Card -->
            <div class="col-6 col-md-4 order-4">
                <div class="card square-card text-center shadow-sm bg-white text-dark border border-1 border-white" style="height: 120px;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-2">
                        <i class="bi bi-person-x fs-3 mb-1 text-dark"></i> <!-- Ensure icon is black -->
                        <p class="card-title mb-1">Quit Date</p>

                        @if ($quitDate && $quitDate->is_active)
                            <p class="card-text fs-7 mb-0">{{ \Carbon\Carbon::parse($quitDate->quit_date)->format('d M Y') }}</p>
                        @else
                            <button class="btn btn-dark btn-sm mt-1" style="font-size: 0.65rem; padding: 0.25rem 0.4rem;" data-bs-toggle="modal" data-bs-target="#quitDateModal">
                                Set {{ $quitDate ? 'New ' : '' }}Quit Date
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Streak Count Card -->
            <div class="col-6 col-md-4 order-5">
                <div class="card square-card text-center shadow-sm bg-dark text-white border border-1 border-white" style="height: 120px;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center p-2">
                        <i class="bi bi-lightning fs-3 mb-1"></i>
                        <p class="card-title mb-1">Streak Count</p>
                        <p class="card-text fs-6 mb-0">{{ $streakCount }}</p>
                    </div>
                </div>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Flipchart Reminder Modal -->
    <div class="modal fade" id="flipchartReminderModal" tabindex="-1" aria-labelledby="flipchartReminderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-warning">
        <div class="modal-header bg-warning">
            <h5 class="modal-title" id="flipchartReminderLabel">Friendly Reminder</h5>
        </div>
        <div class="modal-body text-black">
            <p>It looks like you haven't read the flipchart yet. Please take a moment to go through them.</p>
            <p class="text-muted">This reminder will keep appearing until you confirm that you’ve read the slides.</p>
        </div>
        <div class="modal-footer">
            <a href="{{ route('checkin.flipchart') }}" class="btn btn-primary">Read Now</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Read Later</button>
        </div>
        </div>
    </div>
    </div>

    <hr>

    <!-- Check-in Alert -->
    <div id="checkinAlert" class="alert d-none mx-3 text-center" role="alert" style="max-width: 500px; margin: 0 auto;"></div>


    <div class="nk-content-inner justify-content-center">
        <div class="nk-content-body d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 40vh;">

            <!-- Title -->
            <h5 class="text-center mb-1 fs-7">Smoking Tracker Progress</h5>
            <!-- {{-- Debug output --}} -->
<!-- <p class="text-white">Wave Shift: {{ $circularWaveShift }}%</p>
<p class="text-white">Wave partitions: {{ $wavePartition }}</p> -->



           <!-- Circular Wave Progress -->
            <div class="d-flex justify-content-center mt-3 mb-1" style="position: relative; width: 160px; height: 160px;">
                <div class="loader" style="position: relative; width: 100%; height: 100%;">
                    <div class="waves" style="--wave-shift: {{ $circularWaveShift }}%; width: 100%; height: 100%;"></div>

                    <!-- MOTIVATION TEXT OVERLAY -->
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" style="z-index: 2;">
                        <!-- @if ($wavePartition === 0)
                            <p class="card-text fs-7">Start your transformation now!</p>
                        @elseif ($wavePartition <= 1)
                            <p class="card-text fs-7">Great start! Keep going!</p>
                        @elseif ($wavePartition <= 2)
                            <p class="card-text fs-7">You're doing well!</p>
                        @elseif ($wavePartition <= 3)
                            <p class="card-text fs-7">Halfway there!</p>
                        @elseif ($wavePartition <= 4)
                            <p class="card-text fs-7">Almost there!</p>
                        @elseif ($wavePartition <= 5)
                            <p class="card-text fs-7">Almost there!</p>
                        @elseif ($wavePartition <= 6)
                            <p class="card-text fs-7">Almost there!</p>
                        @else
                            <p class="card-text fs-7">So proud of how far you've become!</p>
                        @endif -->
                        @php
                                $cycle = $streakCount; // number of full 7-day cycles
                                $day = $wavePartition; // day within current cycle (1-7)
                        @ endphp

                            @if ($cycle == 0)
                                {{-- First 7-day wave --}}
                                @switch($day)
                                    @case(0)
                                        <p class="card-text fs-7">Start your transformation now!</p>
                                        @break
                                    @case(1)
                                        <p class="card-text fs-7">Great start! Keep going!</p>
                                        @break
                                    @case(2)
                                        <p class="card-text fs-7">You're doing well!</p>
                                        @break
                                    @case(3)
                                        <p class="card-text fs-7">Halfway there!</p>
                                        @break
                                    @case(4)
                                    @case(5)
                                    @case(6)
                                        <p class="card-text fs-7">Almost there!</p>
                                        @break
                                    @case(7)
                                        <p class="card-text fs-7">So proud of how far you've come!</p>
                                        @break
                                @endswitch
                            @elseif ($cycle == 1)
                                {{-- Second wave --}}
                                @switch($day)
                                    @case(0)
                                        <p class="card-text fs-7">Back for round two! You’re on fire!</p>
                                        @break
                                    @case(1)
                                        <p class="card-text fs-7">You’re building strong habits!</p>
                                        @break
                                    @case(2)
                                        <p class="card-text fs-7">Second wave, same strength!</p>
                                        @break
                                    @case(3)
                                        <p class="card-text fs-7">Midweek master!</p>
                                        @break
                                    @case(4)
                                    @case(5)
                                    @case(6)
                                        <p class="card-text fs-7">End of wave in sight! Push through!</p>
                                        @break
                                    @case(7)
                                        <p class="card-text fs-7">Two full weeks — outstanding!</p>
                                        @break
                                @endswitch
                            @else
                                {{-- Third wave and beyond --}}
                                <p class="card-text fs-7">
                                    Wave {{ $cycle + 1 }}, Day {{ $day }} — you’re unstoppable. Keep up the greatness!
                                </p>
                            @endif
                    </div>
                </div>
            </div>
            <!-- Vertical Wave Progress -->
            <!-- <p class="text-white">Checked in for {{ $wavePartition }} days</p> -->

<div class="wave-container mb-2 mt-3"> <!-- Reduced bottom margin -->
    @for ($i = 1; $i <= 7; $i++)
        <div class="wave-wrapper">
            <div class="wave-part"
                style="height: {{ $i <= $wavePartition ? ($i * 10 + 30) : 20 }}px;
                       background-color: {{ $i <= $wavePartition ? '#1e92ff' : '#fff' }};
                       transition: height 0.3s;">
            </div>
            <small class="day-label text-white">D{{ $i }}</small>
        </div>
    @endfor
</div>

            <!-- Check-In Button -->
            <div class="w-100 d-flex justify-content-center pt-4">
                @if ($hasCheckedInToday)
                    <button type="button" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#alreadyCheckedModal" disabled>
                        Checked-In
                    </button>
                @else
                    <button type="button" class="btn btn-primary btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#smokeModal">
                        Daily Check-In
                    </button>
                @endif
            </div>

            <hr class="w-100 mt-4" />
        </div>
    </div>



    <!-- Sponsor Section -->
    <div class="text-center mt-2 mb-2">
        <figure>
            <blockquote class="blockquote">
                <p>Enjoy Rewards Powered</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">by Zus Coffee</cite>
            </figcaption>
        </figure>
        <img src="zus-logo.png" alt="Zus Coffee Logo" class="img-fluid" style="max-height: 180px;">
    </div>

    <!-- Smoke Modal -->
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
</div>

@if(session('new_badges'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var badgeModal = new bootstrap.Modal(document.getElementById('badgeEarnedModal'));
            badgeModal.show();
        });
    </script>
@endif

    @include('Include.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('btn-no-smoke').addEventListener('click', function () {
        sendCheckIn('not smoke');
    });

    document.getElementById('btn-smoke').addEventListener('click', function () {
        sendCheckIn('smoke');
    });

    function sendCheckIn(action) {
        fetch("{{ route('checkin.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": '{{ csrf_token() }}',
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ action: action })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                const alertBox = document.getElementById("checkinAlert");
                alertBox.classList.remove("d-none", "alert-danger", "alert-warning");
                alertBox.classList.add("alert", "alert-success");
                alertBox.innerHTML = data.message;

                setTimeout(() => {
                    alertBox.classList.add("d-none");
                }, 5000);
            }

            // ✅ Safely get modal instance and hide
            const modalEl = document.getElementById('smokeModal');
            let modal = bootstrap.Modal.getInstance(modalEl);
            if (!modal) {
                modal = new bootstrap.Modal(modalEl);
            }
            modal.hide();

            setTimeout(() => {
                location.reload();
            }, 500);
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>
