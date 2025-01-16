@include('Include.app')

<!-- content @s -->
<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
    <div class="nk-content-body">

        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="nk-block-head">
            <div class="nk-block-head-between flex-wrap gap g-2">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title">Booking List</h1>
                </div>
                <div class="nk-block-head-content">
                    <ul class="d-flex">

                        <li>
                            <a href="/createbooking" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>New Booking</span>
                            </a>
                        </li>
                        <li>
                            <a href="/createbooking" class="btn btn-primary d-none d-md-inline-flex">
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
        <input type="text" id="search-input" class="form-control" placeholder="Search by Package">
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
                            </th>
                        </tr>
        </tr>
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

                            <td style="float:center;">

                                @if($booking->booking_status != 'Cancelled')
                                <a class="btn btn-success btn-sm" href="{{ url('editbooking', $booking->id) }}">Update</a>
                                <a class="btn btn-info btn-sm" href="{{ url('viewbooking', $booking->id) }}">View</a>
                                {!! Form::open(['url' => ['deletebooking', $booking->id], 'method' => 'DELETE', 'class' => 'delete-form', 'style' => 'display:inline;']) !!}
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
            // Get filter values
            var selectedStatus = $('#filter-status').val().toLowerCase().trim();
            var searchInput = $('#search-input').val().toLowerCase().trim();

            // Filter rows in the booking list
            $('#booking-list tr').each(function () {
                var rowStatus = ($(this).data('status') || "").toLowerCase();
                var packageName = $(this).find('td:nth-child(1)').text().toLowerCase();

                // Determine if row matches filters
                var matchesStatus = selectedStatus === "" || rowStatus === selectedStatus;
                var matchesSearch = searchInput === "" || packageName.includes(searchInput);

                // Show or hide row
                $(this).toggle(matchesStatus && matchesSearch);
            });
        }

        // Attach event listeners
        $('#filter-status, #search-input').on('input keyup change', function () {
            applyFilters();
        });

        // Initial filter application
        applyFilters();
    });
</script>
@include('Include.footer')