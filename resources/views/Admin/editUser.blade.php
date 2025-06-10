@include('Include.appadmin')

<div class="nk-content" style="background-color: #0d1b2a; min-height: 100vh; padding: 20px;">
    <div class="container">

        <!-- Back button -->
        <div class="mb-4">
            <a href="{{ route('admin.userDetails', $user->id) }}" class="btn btn-secondary" style="background-color: #22304a; color: #fff; border-radius: 6px;">
                ← Back  
            </a>
        </div>

        <!-- Flash success message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Edit User Form -->
        <div class="card mb-4" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Edit Patient</h3>

            <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" value="{{ $user->age }}" min="0">
                </div>

                <div class="mb-3">
                    <label for="class_name" class="form-label">Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ $user->class_name }}">
                </div>

                <div class="mb-3">
                    <label for="school_id" class="form-label">School</label>
                    <select name="school_id" class="form-control" required>
                        @foreach ($schools as $school)
                            <option value="{{ $school->id }}" {{ $user->school_id == $school->id ? 'selected' : '' }}>
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr style="border-color: #475569;">
                <h5>Change Password (Optional)</h5>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #3399ff; border-radius: 6px;">Update</button>
                <a href="{{ route('admin.userDetails', $user->id) }}" class="btn btn-secondary" style="background-color:rgb(134, 144, 162); color: #fff; border-radius: 6px;">Cancel</a>
            </form>
        </div>

    </div>
</div>

@include('Include.footer')
