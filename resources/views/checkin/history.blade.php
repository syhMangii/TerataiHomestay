@extends('Include.app')

@section('content')
<div class="container">
    <h2>Check-In History</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>Score</th>
                <th>Streak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkIns as $checkIn)
                <tr>
                    <td>{{ $checkIn->date }}</td>
                    <td>{{ $checkIn->action->action_name ?? 'N/A' }}</td>
                    <td>{{ $checkIn->scoreHistory->check_in_score ?? '0' }}</td>
                    <td>{{ $checkIn->scoreHistory->streak_score ?? '0' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
