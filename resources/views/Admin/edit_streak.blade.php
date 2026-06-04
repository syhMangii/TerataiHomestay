@include('Include.appadmin')

        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #22304a; color: #fff; border-radius: 6px;">
                ← Back
            </a>
        </div>

        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Edit Streak</h3>

            <form action="{{ route('admin.updateStreak', $streak->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Streak Count</label>
                    <input type="number" name="streak_count" class="form-control" value="{{ old('streak_count', $streak->streak_count) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update Streak</button>
            </form>
        </div>

@include('Include.footer')
