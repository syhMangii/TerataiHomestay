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
        justify-content: space-around;
        background-color: #feece7;
        border-radius: 20px;
        padding: 15px 8px;
    }
    .streak-meter-item {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ff8a65;
        color: #fff;
        margin: 5px 0;
    }
    .streak-meter-flame {
        background-color: #ff5722;
        font-weight: 700;
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
        background-color: #f0f0f0;
        color: #000;
    }
    .day-checked-in {
        background-color: #000;
        color: #fff;
    }
    .day-today {
        border: 2px solid #000;
        background-color: #fff;
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
                        <i class="bi bi-person-walking shoe-icon"></i>
                    @else
                        {{ $day }}
                    @endif
                </div>
            @endfor
        </div>
        <div class="streak-meter">
            @if($streakInWeeks > 0)
                @for($i = 0; $i < min(3, $streakInWeeks -1 ); $i++)
                    <div class="streak-meter-item">
                        <i class="bi bi-check-lg"></i>
                    </div>
                @endfor
                <div class="streak-meter-item streak-meter-flame">
                    <i class="bi bi-fire"></i>
                </div>
                <div class="streak-meter-item streak-meter-flame" style="font-size: 0.8rem; margin-top: -5px;">
                    {{$streakInWeeks}}
                </div>
            @else
                 <div class="streak-meter-item" style="background-color: #ccc;">
                 </div>
            @endif
        </div>
    </div>
</div>

@include('Include.footer')
