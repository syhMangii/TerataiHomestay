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
                                            <h2 class="nk-block-title">Homestay List</h1>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="d-flex">
                                  
                                                <li>
                                                    <a href="/createhomestays" class="btn btn-md d-md-none btn-primary">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>New Homestay</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/createhomestays" class="btn btn-primary d-none d-md-inline-flex" >
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>New Homestay</span>
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
                                                        <span class="overline-title">Homestay Name</span>
                                                    </th>
                                                    <th class="tb-col">
                                                        <span class="overline-title">Price</span>
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
                                            @foreach ($homestays as $key => $homestay)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $homestay->homestay_name ?? '-' }}</td>
        <td>RM {{ $homestay->homestay_price ?? '-' }}</td>
        <td>{{ $homestay->updated_at ? Carbon\Carbon::parse($homestay->updated_at)->formatLocalized('%d %b %Y %I:%M:%S %p') : 'N/A' }}</td>
   
        <td style="float:right;">
                <a class="btn btn-success" href="{{ url('edithomestays', $homestay->id) }}">Edit</a>
                <a class="btn btn-info" href="{{ url('viewhomestays', $homestay->id) }}">View</a>
                {!! Form::open(['url' => ['deletehomestays', $homestay->id], 'method' => 'DELETE', 'class' => 'delete-form', 'style' => 'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to Delete this Homestay?")']) !!}
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
               @include('Include.footer')