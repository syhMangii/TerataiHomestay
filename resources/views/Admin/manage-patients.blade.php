@include('Include.appadmin')

<div class="nk-content" style="background-color: #0d1b2a; min-height: 100vh;">
    <div class="nk-content-inner">
        <div class="nk-content-body">

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>  {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="nk-block-head mb-4">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title" style="color: #ffffff;">Patient List</h2>
                        <a href="{{ route('admin.addUserForm') }}" class="btn btn-primary mt-2" style="background-color: #3399ff; border-radius: 6px;">+ Add Patient</a>
                    </div>
                </div>
            </div>

            <div class="nk-block">

                <!-- Filters -->
                <form method="GET" class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                    <select name="school" class="form-select form-select-sm" style="width: auto;">
                        <option value="">All Schools</option>
                        @foreach ($schools as $school)
                            <option value="{{ $school->name }}" {{ request('school') == $school->name ? 'selected' : '' }}>
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="sort" class="form-select form-select-sm" style="width: auto;">
                        <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Newest First</option>
                        <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Oldest First</option>
                    </select>

                    <button type="submit" class="btn btn-sm btn-light">Filter</button>
                    <a href="{{ route('admin.patients') }}" class="btn btn-sm btn-secondary">Clear</a>
                </form>

                <!-- Patient Table -->
                <div class="card" style="background-color: #1a2639; border: 1px solid #22304a; border-radius: 10px;">
                    <div class="card-body p-0">
                        <table class="table table-sm mb-0" style="font-size: 14px; color: #ffffff;">
                            <thead style="background-color: #1e2a40; color: #d1d9e6;">
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Age</th>
                                    <th>Class</th>
                                    <th>School</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->class_name }}</td>
                                    <td>{{ $user->school->name ?? '-' }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.userDetails', $user->id) }}" class="btn btn-sm" style="background-color: #3399ff; color: #fff; border-radius: 5px;">View</a>
                                        <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No patients found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('Include.footer')
