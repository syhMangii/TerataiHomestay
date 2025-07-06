@include('Include.appadmin')

<div class="nk-content" style="background-color: #0d1b2a; min-height: 100vh; padding: 20px;">
    <div class="container">

        <div class="card" style="background-color: #1a2639; color: #fff; border-radius: 10px; padding: 20px;">
            <h3>Add New Patient</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.saveUser') }}">
                @csrf

                <!-- <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div> -->

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <!-- <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div> -->

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" min="0">
                </div>

                <div class="mb-3">
                    <label for="class_name" class="form-label">Class Name</label>
                    <input type="text" class="form-control" name="class_name">
                </div>

                <div class="mb-3">
                    <label for="school_id" class="form-label">School</label>
                    <select name="school_id" class="form-control" required>
                        @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- No clinic_id selection, clinic_id will be NULL -->

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #3399ff; border-radius: 6px;">Register</button>
                 <a href="{{ route('admin.patients') }}" class="btn btn-secondary" style="background-color:rgb(134, 144, 162); color: #fff; border-radius: 6px;">
                Cancel
            </a>
            </form>
        </div>

    </div>
</div>

@include('Include.footer')
