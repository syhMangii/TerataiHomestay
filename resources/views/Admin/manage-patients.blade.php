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
                            <h2 class="nk-block-title">Patient List</h2>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card p-3">
                        <input type="text" id="search-input" class="form-control mb-3" placeholder="Search by Name or Phone">

                        <table class="table table-sm" style="font-size: 14px; white-space: nowrap;">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="patient-list">
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="{{ route('admin.checkins', $user->id) }}" class="btn btn-info btn-sm">View Check-Ins</a>
                                        <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
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

<script>
    $(document).ready(function () {
        $('#search-input').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $("#patient-list tr").filter(function () {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });
        });
    });
</script>

@include('Include.footer')
