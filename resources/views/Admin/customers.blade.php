@include('Include.appadmin')

<!-- content @s -->
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
                            <h2 class="nk-block-title">Customer List</h2>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/createCustomer" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-plus"></em>
                                        <span>New Customer</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->


                <div class="nk-block">
                    <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- Search Input -->
    <div>
        <input type="text" id="search-input" class="form-control" placeholder="Search by Name">
    </div>
    <!-- Dropdown for Booking Status -->    
</div>

<table class="table table-sm" data-nk-container="table-responsive" style="font-size: 14px; white-space: nowrap;">
    <thead class="table-light">
        <tr>
                           
                            <th class="tb-col">
                                <span class="overline-title">No</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Name</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Username</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Phone</span>
                            </th>                                    
                            <th class="tb-col" data-sortable="false">
                                <span class="overline-title">Action</span>
                            </th>                                
                        </tr>
                            </thead>
                            <tbody id="customer-list">
                                @foreach ($customers as $key => $cust)
                                    <tr>
                    <span>  
                    <td>{{ ++$key }}</td>
                    <td>{{ $cust->name ?? '-' }}</td>
                                    <td>{{ $cust->username ?? '-' }}</td>
                                    <td>{{ $cust->phone ?? '-' }}</td>
        <td 
        style="float:left;">
        <a class="btn btn-success btn-sm" href="{{ url('editCustomer', $cust->id) }}">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ url('viewCustomer', $cust->id) }}">View</a>
                {!! Form::open(['url' => ['deletecustomer', $cust->id], 'method' => 'DELETE', 'class' => 'delete-form', 'style' => 'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Are you sure you want to Delete this Customer?")']) !!}
                {!! Form::close() !!}
        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div> <!-- .nk-content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
    function applyFilters() {
        var searchInput = $('#search-input').val().toLowerCase().trim();

        $('#customer-list tr').each(function () {
            var name = $(this).find('td:nth-child(2)').text().toLowerCase();

            if (name.includes(searchInput)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    $('#search-input').on('input', function () {
        applyFilters();
    });

    applyFilters();
});

</script>

@include('Include.footer')

