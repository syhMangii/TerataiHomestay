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
                                            <h2 class="nk-block-title">Booking List</h1>
                                        </div>
                                        <div class="nk-block-head-content">
                    <ul class="d-flex">

                        <li>
                            <a href="/createbookingAdmin" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>New Booking</span>
                            </a>
                        </li>
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
                                    <div class="card">

                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col">
                                                        <span class="overline-title">No</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Package</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Booking Date</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Total Price</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Status</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Customer</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Last Update</span>
                                                    </th>
                                                    <th class="tb-col tb-col-end" data-sortable="false">
                                                        <span class="overline-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($bookings as $key => $booking)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $booking->Homestay->homestay_name ?? '-' }}</td>
        <td>{{ $booking->booking_date ? Carbon\Carbon::parse($booking->booking_date)->formatLocalized('%d %b %Y') : 'N/A' }}</td>
        <td>RM {{ $booking->booking_total_price ?? '-' }}</td>
        <td>{{ $booking->booking_status ?? '-' }}</td>
        <td>{{ $booking->createdByUser->name ?? '-' }}</td>
        <td>{{ $booking->updated_at ? Carbon\Carbon::parse($booking->updated_at)->formatLocalized('%d %b %Y %I:%M:%S %p') : 'N/A' }}</td>
   
        <td style="float:right;">

                @if($booking->booking_status != 'Cancelled')
                <a class="btn btn-success" href="{{ url('editbookingAdmin', $booking->id) }}">Edit</a>
                <a class="btn btn-info" href="{{ url('viewbookingadmin', $booking->id) }}">View</a>
             
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
               @include('Include.footer')