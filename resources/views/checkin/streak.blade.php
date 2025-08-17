@include('Include.app')

<style>
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
        font-size: 1.5rem;
        color: #ff5722;
        margin-bottom: 10px;
    }
    .streak-meter-steps {
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        gap: 8px;
        flex-grow: 1;
        margin-bottom: 10px;
    }
    .streak-meter-step i {
        font-size: 1rem;
        color: #ddd;
    }
    .streak-meter-step i.active {
        color: #ff8a65;
    }
    .streak-meter-bottom {
        font-size: 1rem;
        font-weight: 700;
        background-color: #ff5722;
        color: #fff;
        border-radius: 50%;
        width: 32px;
        height: 32px;
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
</style>

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
            <button type="button" class="btn btn-dark btn-lg" disabled>
                Checked-In
            </button>
        @else
            <button type="button" class="btn btn-dark btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#smokeModal">
                Daily Check-In
            </button>
        @endif
    </div>
</div>

<!-- Smoke Modal -->
<div class="modal fade" id="smokeModal" tabindex="-1" aria-labelledby="smokeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
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
    var smokeModal = document.getElementById('smokeModal');
    if(smokeModal) {
        document.getElementById('btn-no-smoke').addEventListener('click', function () {
            sendCheckIn('not smoke');
        });

        document.getElementById('btn-smoke').addEventListener('click', function () {
            sendCheckIn('smoke');
        });
    }

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
