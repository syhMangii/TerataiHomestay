@include('Include.appadmin')

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>  {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Homestay List</h2>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li>
                                    <a href="/createhomestays" class="btn btn-primary d-none d-md-inline-flex">
                                        <em class="icon ni ni-plus"></em>
                                        <span>New Homestay</span>
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
        <input type="text" id="search-input" class="form-control" placeholder="Search by Homestay">
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
                                <span class="overline-title">Homestay</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Price</span>
                            </th>
                            <th class="tb-col">
                                <span class="overline-title">Update</span>
                            </th>                                    
                            <th class="tb-col" data-sortable="false">
                                <span class="overline-title">Action</span>
                            </th>                                
                        </tr>
                            </thead>
                            <tbody id="homestay-list">
                                @foreach ($homestays as $key => $homestay)
                                    <tr>
                    <span>  
                    <td>{{ ++$key }}</td>
        <td>{{ $homestay->homestay_name ?? '-' }}</td>
        <td>RM {{ $homestay->homestay_price ?? '-' }}</td>
        <td>{{ $homestay->updated_at ? Carbon\Carbon::parse($homestay->updated_at)->formatLocalized('%d %b %Y %I:%M:%S %p') : 'N/A' }}</td>
   
        <td 
        style="float:left;">
                <a class="btn btn-success btn-sm" href="{{ url('edithomestays', $homestay->id) }}">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ url('viewhomestays', $homestay->id) }}">View</a>
                {!! Form::open(['url' => ['deletehomestays', $homestay->id], 'method' => 'DELETE', 'class' => 'delete-form', 'style' => 'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Are you sure you want to Delete this Homestay?")']) !!}
                {!! Form::close() !!}
        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- .card -->
                </div><!-- .nk-block -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
    function applyFilters() {
        var searchInput = $('#search-input').val().toLowerCase().trim();

        $('#homestay-list tr').each(function () {
            var packageName = $(this).find('td:nth-child(2)').text().toLowerCase();

            if (packageName.includes(searchInput)) {
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

