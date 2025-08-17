@include('Include.app')

@if(session('new_badges'))
    <!-- Badge Earned Modal -->
    <div class="modal fade" id="badgeEarnedModal" tabindex="-1" aria-labelledby="badgeEarnedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="badgeEarnedLabel">🎉 Badge Unlocked!</h5>
                </div>
                <div class="modal-body text-center text-black">
                    <p class="mb-3">You've earned the following badge{{ count(session('new_badges')) > 1 ? 's' : '' }}:</p>
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

<!-- JavaScript for Quit Date Modal -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    @if (!$activeQuitDate)
        var quitDateModal = new bootstrap.Modal(document.getElementById('quitDateModal'));
        quitDateModal.show();
    @endif
});
</script>

<!-- JavaScript for Flipchart Modal -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    @if ($showFlipchartAlert)
        var flipchartModal = new bootstrap.Modal(document.getElementById('flipchartReminderModal'));
        flipchartModal.show();
    @endif
});
</script>

<!-- Custom Styles -->
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
        font-size: 1.2rem;
        margin-bottom: 0.3rem;
    }

    .square-card .card-title {
        font-size: 0.75rem;
        margin: 0;
    }

    .square-card .card-text {
        font-size: 0.9rem;
        margin: 0;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #fff;
        color: #000;
    }

    .container {
        padding: 20px;
        max-width: 480px;
        margin: auto;
    }

    .header {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .stats {
        display: flex;
        gap: 40px;
        margin-bottom: 25px;
    }

    .stat-item {
        text-align: left;
    }

    .stat-item .label {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 5px;
    }

    .stat-item .value {
        font-size: 1.5rem;
        font-weight: 700;
    }


    .calendar-wrapper {
        display: flex;
        gap: 15px;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        text-align: center;
        flex-grow: 1;
    }


    .streak-meter {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #feece7;
        border-radius: 20px;
        padding: 15px 8px;
    }

    .streak-meter-top {
        font-size: 1.2rem;
        color: #ff5722;
        margin-bottom: 8px;
    }

    .streak-meter-steps {
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        gap: 6px;
        flex-grow: 1;
        margin-bottom: 8px;
    }

    .streak-meter-step i {
        font-size: 0.8rem;
        color: #ddd;
    }

    .streak-meter-step i.active {
        color: #ff8a65;
    }

    .streak-meter-bottom {
        font-size: 0.9rem;
        font-weight: 700;
        background-color: #ff5722;
        color: #fff;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .day-name {
        font-weight: 600;
        color: #888;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    .day-cell {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 500;
        font-size: 1rem;
        background-color: #204367;
        color: #fff;
    }

    .day-today {
        border: 2px solid #fff;
        background-color: #0d1b2a;
    }

    .day-empty {
        background-color: transparent;
    }

    .shoe-icon {
        font-size: 1.5rem;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 576px) {
        .calendar-wrapper {
            gap: 8px;
        }

        .calendar-grid {
            gap: 4px;
        }

        .day-cell {
            width: 25px;
            height: 25px;
            font-size: 0.7rem;
        }

        .day-name {
            font-size: 0.6rem;
            margin-bottom: 6px;
        }

        .streak-meter {
            padding: 8px 4px;
            min-width: 20px;
        }

        .streak-meter-top {
            font-size: 1rem;
        }

        .streak-meter-bottom {
            width: 24px;
            height: 24px;
            font-size: 0.8rem;
        }

        .streak-meter-step i {
            font-size: 0.7rem;
        }

        .shoe-icon {
            font-size: 0.8rem;
        }
    }
</style>

<!-- Main Content -->
<div class="container-fluid">
    <hr>
    <br><br>

    <!-- Statistics Cards Section -->
    <div class="row justify-content-center gx-3 gy-1">
        <!-- 1. Check-in Score -->
        <div class="col-4 col-md-2 mx-auto">
            <div class="card square-card text-center shadow-sm bg-primary text-white border border-1 border-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-calendar2-check fs-1 mb-0"></i>
                    <p class="card-title text-nowrap">Check-in Score</p>
                    <p class="card-text fs-6">{{ $checkinScore }}</p>
                </div>
            </div>
        </div>

        <!-- 2. Streak Score -->
        <div class="col-4 col-md-2 mx-auto">
            <div class="card square-card text-center shadow-sm bg-success text-white border border-1 border-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-fire fs-1 mb-0"></i>
                    <p class="card-title">Streak Score</p>
                    <p class="card-text fs-6">{{ $streakScore }}</p>
                </div>
            </div>
        </div>

        <!-- 3. Total Score -->
        <div class="col-4 col-md-2 mx-auto">
            <div class="card square-card text-center shadow-sm bg-warning text-white border border-1 border-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-bar-chart-line fs-1 mb-0"></i>
                    <p class="card-title">Total Score</p>
                    <p class="card-text fs-6">{{ $totalScore }}</p>
                </div>
            </div>
        </div>

        <!-- Break for mobile: 3 on top, 2 on bottom -->
        <div class="w-100 d-md-none"></div>

        <!-- 4. Quit Date -->
        <div class="col-4 col-md-2 mx-auto">
            <div class="card square-card text-center shadow-sm bg-white text-dark border border-1 border-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-2">
                    <i class="bi bi-person-x fs-3 mb-1 text-dark"></i>
                    <p class="card-title mb-1">Quit Date</p>
                    
                    @if ($quitDate && $quitDate->is_active)
                        <p class="card-text fs-7 mb-0 text-nowrap">{{ \Carbon\Carbon::parse($quitDate->quit_date)->format('d M Y') }}</p>
                    @else
                        <button class="btn btn-dark btn-sm mt-1 text-nowrap" style="font-size: 0.65rem; padding: 0.25rem 0.4rem;" data-bs-toggle="modal" data-bs-target="#quitDateModal">
                            Set Quit Date
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- 5. Streak Count -->
        <div class="col-4 col-md-2 mx-auto">
            <div class="card square-card text-center shadow-sm bg-dark text-white border border-1 border-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-2">
                    <i class="bi bi-lightning fs-3 mb-1"></i>
                    <p class="card-title mb-1">Streak Count</p>
                    <p class="card-text fs-6 mb-0">{{ $streakCount }}</p>
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

    @php
        use Carbon\Carbon; 
        use App\Models\QuitDate;

        $user = auth()->user();
        $createdAt = $user->created_at;
        $moreThan2Weeks = $createdAt->lt(now()->subWeeks(2));
        $hasActiveQuitDate = $user->quitDates()->where('is_active', true)->exists();
    @endphp

    @if ($moreThan2Weeks && !$user->is_read)
        <!-- Flipchart Reminder Modal -->
        <div class="modal fade" id="flipchartReminderModal" tabindex="-1" aria-labelledby="flipchartReminderLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-warning">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="flipchartReminderLabel">Friendly Reminder</h5>
                    </div>
                    <div class="modal-body text-black">
                        <p>It looks like you haven't read the flipchart yet. Please take a moment to go through them.</p>
                        <p class="text-muted">This reminder will keep appearing until you confirm that you've read the slides.</p>
                    </div>
                    <div class="modal-footer">
                        @if (!$moreThan2Weeks)
                            <a href="{{ route('flipchart.welcome') }}" class="btn btn-primary">Read Now</a>
                        @elseif ($moreThan2Weeks && $hasActiveQuitDate)
                            <a href="{{ route('flipchart.afterQuit') }}" class="btn btn-primary">Read Now</a>
                        @else
                            <a href="{{ route('flipchart') }}" class="btn btn-primary">Read Now</a>
                        @endif

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Read Later</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <hr>

    <!-- Calendar and Streak Section -->
    <div class="container">
        <div class="header">{{ $monthName }} {{ $year }}</div>

        <div class="stats">
            <div class="stat-item">
                <div class="label">Your Streak</div>
                <div class="value">{{ $streakInWeeks }} Weeks</div>
            </div>
            <div class="stat-item">
                <div class="label">Streak Activities</div>
                <div class="value">{{ $totalActivities }}</div>
            </div>
        </div>

        <div class="calendar-wrapper">
            <div class="calendar-grid">
                @foreach(['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $day)
                    <div class="day-name">{{ $day }}</div>
                @endforeach

                @for ($i = 1; $i < $firstDayOfMonth; $i++)
                    <div class="day-cell day-empty"></div>
                @endfor

                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $isToday = ($day == now()->day && $monthName == now()->format('F') && $year == now()->year);
                        $isCheckedIn = isset($checkInsByDay[$day]);
                    @endphp
                    <div class="day-cell {{ $isToday ? 'day-today' : '' }} {{ $isCheckedIn ? 'day-checked-in' : '' }}">
                        @if($isCheckedIn)
                            <i class="bi bi-fire shoe-icon"></i>
                        @else
                            {{ $day }}
                        @endif
                    </div>
                @endfor
            </div>

            <div class="streak-meter">
                <div class="streak-meter-top">
                    <i class="bi bi-fire"></i>
                </div>
                <div class="streak-meter-steps">
                    @for ($i = 7; $i >= 1; $i--)
                        <div class="streak-meter-step">
                            <i class="bi bi-circle-fill {{ $i <= ($continuousStreakCount % 7) ? 'active' : '' }}"></i>
                        </div>
                    @endfor
                </div>
                <div class="streak-meter-bottom">
                    {{ $continuousStreakCount }}
                </div>
            </div>
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
    </div>

    <!-- <hr class="w-100 mt-4" /> -->

    <!-- Sponsor Section -->
    <!-- <div class="text-center mt-2 mb-2">
        <figure>
            <blockquote class="blockquote">
                <p>Enjoy Rewards Powered</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">by Zus Coffee</cite>
            </figcaption>
        </figure>
        <img src="zus-logo.png" alt="Zus Coffee Logo" class="img-fluid" style="max-height: 180px;">
    </div> -->

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

<!-- Badge Modal JavaScript -->
@if(session('new_badges'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var badgeModal = new bootstrap.Modal(document.getElementById('badgeEarnedModal'));
            badgeModal.show();
        });
    </script>
@endif

@include('Include.footer')

<!-- Main JavaScript for Check-In Functionality -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Ensure we are targeting the correct modal buttons
    const smokeModal = document.getElementById('smokeModal');
    if (smokeModal) {
        const noSmokeButton = smokeModal.querySelector('#btn-no-smoke');
        const smokeButton = smokeModal.querySelector('#btn-smoke');

        if(noSmokeButton) {
            noSmokeButton.addEventListener('click', function () {
                sendCheckIn('not smoke');
            });
        }

        if(smokeButton) {
            smokeButton.addEventListener('click', function () {
                sendCheckIn('smoke');
            });
        }
    }
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
    .then(response => {
        if (!response.ok) {
            console.error('Server responded with an error:', response.status);
        }
        return response.json();
    })
    .then(data => {
        const modalEl = document.getElementById('smokeModal');
        if (modalEl) {
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) {
                modal.hide();
            }
        }

        if (data.message) {
            const alertBox = document.getElementById("checkinAlert");
            if (alertBox) {
                alertBox.classList.remove("d-none");
                alertBox.classList.add("alert", "alert-success");
                alertBox.innerHTML = data.message;
                setTimeout(() => {
                    alertBox.classList.add("d-none");
                }, 3000);
            }
        }

        // Reload the page after the modal is hidden
        setTimeout(() => {
            location.reload();
        }, 500);
    })
    .catch(error => {
        console.error('Error during fetch:', error);
        const alertBox = document.getElementById("checkinAlert");
        if (alertBox) {
            alertBox.classList.remove("d-none");
            alertBox.classList.add("alert", "alert-danger");
            alertBox.innerHTML = 'An error occurred. Please try again.';
            setTimeout(() => {
                alertBox.classList.add("d-none");
            }, 5000);
        }
    });
}
</script>