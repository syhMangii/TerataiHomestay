@include('Include.appadmin')

<div class="nk-content" style="background-color: #0d1b2a; min-height: 100vh; padding: 20px;">
    <div class="container">

        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #22304a; color: #fff; border-radius: 6px;">
                ← Back
            </a>
        </div>

        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Edit Check-In</h3>

            <form action="{{ route('admin.updateCheckin', $checkIn->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Action</label>
                    <input type="text" name="action" class="form-control" value="{{ old('action', $checkIn->action) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Is Continuous?</label>
                    <select name="is_continous" class="form-control" required>
                        <option value="1" {{ $checkIn->is_continous ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$checkIn->is_continous ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Check-In</button>
            </form>
        </div>

    </div>
</div>

@include('Include.footer')
