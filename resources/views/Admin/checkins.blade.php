@include('Include.appadmin')

<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>  {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Check-Ins for {{ $user->name }}</h2>
                         </div>
                         <div class="nk-block-head-content">
                            <a href="{{ route('admin.patients') }}" class="btn btn-secondary">← Back to Patients</a>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card p-3">
                        <table class="table table-sm" style="font-size: 14px; white-space: nowrap;">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <th>Score</th>
                                    <th>Streak</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkins as $checkin)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($checkin->checkin_date)->format('d M Y') }}</td>
                                    <td>
                                        @if($checkin->action_id == 111)
                                            <span class="badge bg-success">Non-Smoking</span>
                                        @elseif($checkin->action_id == 222)
                                            <span class="badge bg-danger">Smoking</span>
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </td>
                                    <td>{{ $checkin->score }}</td>
                                    <td>{{ $checkin->streak_score }}</td>
                                    <td>{{ $checkin->created_at->format('d M Y h:i A') }}</td>
                                    <td>
                                        <a href="{{ route('admin.checkin.edit', $checkin->user_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.checkin.delete', $checkin->user_id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this check-in?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('Include.footer')
