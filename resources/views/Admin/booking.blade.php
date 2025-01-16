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
                            <h2 class="nk-block-title">Booking List</h2>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/createbookingAdmin" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-plus"></em>
                                        <span>New Booking</span>
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
        <input type="text" id="search-input" class="form-control" placeholder="Search by Package or Customer">
    </div>
    <!-- Dropdown for Booking Status -->
    <div>
        <select id="filter-status" class="form-select">
            <option value="">-- All Statuses --</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Incoming">Incoming</option>
            <option value="Check-in">Check-in</option>
            <option value="Check-out">Check-out</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>
</div>

<table class="table table-sm" data-nk-container="table-responsive" style="font-size: 14px; white-space: nowrap;">
    <thead class="table-light">
        <tr>
        <tr>
                            <th class="tb-col">
                                <span class="overline-title">Homestay</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Pax</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">In</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Out</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Status</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Customer</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Price</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">BBQ</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Receipt</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Update</span>
                            </th>                                    
                            <th class="tb-col" data-sortable="false">
                                <span class="overline-title">Action</span>
                            </th>                                </tr>
                            </thead>
                            <tbody id="booking-list">
                                @foreach ($bookings as $key => $booking)
                                <tr data-status="{{ $booking->booking_status }}">
                    <span>  <td>{{ $booking->Homestay->homestay_name ?? '-' }}</td></span>
                            <td>{{ $booking->booking_guest_number ?? '-' }}</td>
                            <td>{{ $booking->booking_check_in_date ? Carbon\Carbon::parse($booking->booking_check_in_date)->formatLocalized('%d %b %Y') : 'N/A' }}</td>
                            <td>{{ $booking->booking_check_out_date ? Carbon\Carbon::parse($booking->booking_check_out_date)->formatLocalized('%d %b %Y') : 'N/A' }}</td>
                            <td>
                                        @switch($booking->booking_status)
                                            @case('Confirmed')
                                                <span class="badge rounded-pill bg-success">Confirmed</span>
                                                @break
                                            @case('Incoming')
                                                <span class="badge rounded-pill bg-warning text-dark">Incoming</span>
                                                @break
                                            @case('Check-in')
                                                <span class="badge rounded-pill bg-primary">Check-in</span>
                                                @break
                                            @case('Check-out')
                                                <span class="badge rounded-pill bg-secondary">Check-out</span>
                                                @break
                                            @case('Cancelled')
                                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                                                @break
                                            @default
                                                <span>-</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $booking->createdByUser->name ?? '-' }}</td>
                                    <td>RM {{ $booking->booking_total_price ?? '-' }}</td>
                                    <td>
                                        @if($booking->booking_is_bbq === 1)
                                            <span class="text-success">
                                                <i class="icon ni ni-check-circle"></i> <!-- Right icon -->
                                            </span>
                                        @elseif($booking->booking_is_bbq === 0)
                                            <span class="text-danger">
                                                <i class="icon ni ni-cross-circle"></i> <!-- Cross icon -->
                                            </span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                    @if($booking->booking_receipt)
                                        <a href="{{ route('download.receipt', $booking->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-download"></i> Download
                                        </a>
                                    @else
                                        <span class="text-muted">No receipt uploaded</span>
                                    @endif
                                    </td>                                    
                                    <td>{{ $booking->updated_at ? Carbon\Carbon::parse($booking->updated_at)->formatLocalized('%d %b %Y %I:%M:%S %p') : 'N/A' }}</td>
                                    <td>
                                        @if($booking->booking_status != 'Cancelled')
                                        <a class="btn btn-success btn-sm" href="{{ url('editbookingAdmin', $booking->id) }}">Update</a>
                                        <a class="btn btn-info btn-sm" href="{{ url('viewbookingadmin', $booking->id) }}">View</a>
                                        {!! Form::open(['url' => ['deleteBookingadmin', $booking->id], 'method' => 'POST', 'class' => 'delete-form', 'style' => 'display:inline;']) !!}
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            {!! Form::submit('Cancel', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Are you sure you want to Cancel this Booking?")']) !!}
                                        {!! Form::close() !!}
                                        @else
                                        -
                                        @endif
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
            var selectedStatus = $('#filter-status').val().toLowerCase().trim();
            var searchInput = $('#search-input').val().toLowerCase().trim();

            $('#booking-list tr').each(function () {
                var rowStatus = ($(this).data('status') || "").toLowerCase();
                var packageName = $(this).find('td:nth-child(1)').text().toLowerCase();
                var customerName = $(this).find('td:nth-child(6)').text().toLowerCase();

                var matchesStatus = selectedStatus === "" || rowStatus === selectedStatus;
                var matchesSearch =
                    searchInput === "" ||
                    packageName.includes(searchInput) ||
                    customerName.includes(searchInput);

                $(this).toggle(matchesStatus && matchesSearch);
            });
        }

        $('#filter-status, #search-input').on('input keyup change', function () {
            applyFilters();
        });

        applyFilters();
    });
</script>

@include('Include.footer')

