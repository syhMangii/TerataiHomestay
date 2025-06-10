@include('Include.appadmin')

<div class="nk-content" style="background-color: #0d1b2a; min-height: 100vh; padding: 20px;">
    <div class="container">

    <div class="container">

    <!-- Flash message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- rest of your content here -->


        <!-- Back button -->
        <div class="mb-4">
            <a href="/admin/patients" class="btn btn-secondary" style="background-color: #22304a; color: #fff; border-radius: 6px;">
                ← Back
            </a>
        </div>

       <!-- User Details -->
        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">User Details</h3>
                <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-success btn-sm">Edit User</a>
            </div>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone ?? '-' }}</p>
            <p><strong>Age:</strong> {{ $user->age ?? '-' }}</p>
            <p><strong>Class Name:</strong> {{ $user->class_name ?? '-' }}</p>
            <p><strong>School:</strong> {{ $user->school ? $user->school->name : '-' }}</p>

            <!-- Flipchart Read Status -->
            <p>
                <strong>Flipchart:</strong>
                @if($user->is_read)
                    <span style="color: #28a745;">
                        <i class="bi bi-check-circle-fill"></i> Read
                    </span>
                @else
                    <span style="color: #dc3545;">
                        <i class="bi bi-x-circle-fill"></i> Not Read
                    </span>
                @endif
            </p>

            <!-- Quit Date -->
            <p>
                <strong>Quit Date:</strong>
                @if($quitDate)
                    {{ \Carbon\Carbon::parse($quitDate->quit_date)->format('Y-m-d') }}
                @else
                    -
                @endif
            </p>
        </div>

        <!-- Score Histories -->
        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Score Histories</h3>
            <table class="table table-sm" style="width: 100%;">
                <thead>
                    <tr style="border-bottom: 1px solid #1a2639;">
                        <th style="border-bottom: 1px solid #1a2639;">Date</th>
                        <th style="border-bottom: 1px solid #1a2639;">Source</th>
                        <th style="border-bottom: 1px solid #1a2639;">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scoreHistories as $scoreHistory)
                        <tr style="border-bottom: 1px solid #1a2639;">
                            <td>{{ $scoreHistory->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @php
                                    $source = '-';
                                    if ($checkIns->where('score_history_id', $scoreHistory->id)->count() > 0) {
                                        $source = 'Check-In';
                                    } elseif ($streaks->where('score_history_id', $scoreHistory->id)->count() > 0) {
                                        $source = 'Streak';
                                    }
                                @endphp
                                {{ $source }}
                            </td>
                            <td>{{ $scoreHistory->score }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No score histories found.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr style="border-top: 1px solid #fff;">
                        <td colspan="2" style="text-align: right;"><strong>Total Accumulated Score:</strong></td>
                        <td><strong>{{ $totalScore }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Check-Ins -->
        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Check-In Log</h3>
            <table class="table table-sm" style=" width: 100%;">
                <thead>
                    <tr style="border-bottom: 1px solid #1a2639;">
                        <th style="border-bottom: 1px solid #1a2639;" >Date</th>
                        <th style="border-bottom: 1px solid #1a2639;">Action</th>
                        <!-- <th style="border-bottom: 1px solid #1a2639;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checkIns as $checkIn)
                    <tr style="border-bottom: 1px solid #1a2639;">
                        <td>{{ $checkIn->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $checkIn->action }}</td>
                        <!-- <td>
                            <a href="{{ route('admin.editCheckin', $checkIn->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.deleteCheckin', $checkIn->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this check-in?')">Delete</button>
                            </form>
                        </td> -->
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No check-ins found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Streaks -->
        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Streak Log</h3>
            <table class="table table-sm" style="background-color: transparent; color: #1a2639; border-collapse: collapse; width: 100%;">
                <thead>
                    <tr style="border-bottom: 1px solid #1a2639;">
                        <th style="border-bottom: 1px solid #1a2639; color: #1a2639;">Date</th>
                        <th style="border-bottom: 1px solid #1a2639; color: #1a2639;">Streak Count</th>
                        <th style="border-bottom: 1px solid #1a2639; color: #1a2639;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($streaks as $streak)
                    <tr style="border-bottom: 1px solid #fff;">
                        <td>{{ $streak->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $streak->streak_count }}</td>
                        <td>
                            <a href="{{ route('admin.editStreak', $streak->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.deleteStreak', $streak->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this streak?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No streaks found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@include('Include.footer')
