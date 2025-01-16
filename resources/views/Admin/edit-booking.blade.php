@include('Include.appadmin')

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <div class="nk-block">

                    <!-- content @s -->
                    <div class="nk-content">
                        <div class="container">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-between flex-wrap gap g-2 align-items-center">
                                                <div class="nk-block-head-content">
                                                    <div class="d-flex flex-column flex-md-row align-items-md-center">

                                                        <div class="mt-3 mt-md-0 ms-md-3">
                                                            <h3 class="title mb-1" style="color:blue;"><u>EDIT BOOKING</u></h3>


                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head-content -->

                                            </div><!-- .nk-block-head-between -->
                                        </div><!-- .nk-block-head -->
                                    </div><!-- .nk-block-head -->
                                

                                    {!! Form::model($booking, ['url' => ['updateBookingAdmin', $booking->id], 'method' => 'POST']) !!}
                                                    @csrf
                                    <div class="nk-block">
                                        <div class="card card-gutter-md">
                                            <div class="card-body">
                                                <div class="bio-block">
                                                    <h4 class="bio-block-title mb-4" style="color:blue;"><u>1. HOMESTAY INFORMATION</u></h4>
                                                    <div class="row g-3">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="firstname" class="form-label">Homestay</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" name="homestay_id" id="homestay_id" required>
                                                                        <option value="" selected disabled>-- Select Homestay --</option>
                                                                        @foreach($homestays as $homestay)
                                                                        <option 
                                                                        value="{{ $homestay->id }}"
                                                                        data-price="{{ $homestay->homestay_price }}"
                                                                        data-desc="{{ $homestay->homestay_details }}"
                                                                        >{{ $homestay->homestay_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="firstname" class="form-label">Customer</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" name="created_by" id="created_by" required>
                                                                        <option value="" selected disabled>-- Select Customer --</option>
                                                                        @foreach($customers as $customer)
                                                                        <option 
                                                                        value="{{ $customer->id }}"
                                                                        @if($booking->created_by == $customer->id )
                                                                        selected
                                                                        @endif
                                                                        >{{ $customer->username }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="lastname" class="form-label">Price</label>
                                                                <div class="form-control-wrap">
                                                                <input type="number" step="0.01" class="form-control" id="homestay_price" name="homestay_price" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="remarks" class="form-label">Homestay Details</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" maxlength="1000" rows="10" name="homestay_details" id="homestay_details" disabled></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                      
                                                    </div>

                                                    </div>

                                                </div><!-- .bio-block -->
                                            </div><!-- .card-body -->
                                        </div><!-- .card -->


                                        <div class="nk-block">
                                                            <div class="card card-gutter-md">
                                                                <div class="card-body">
                                                                    <div class="bio-block">
                                                                        <h4 class="bio-block-title mb-4" style="color:blue;"><u>2. BOOKING INFORMATION</u></h4>
                                                                        <div class="row g-3">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="booking_check_in_date" class="form-label">Booking Check-In Date</label>
                                                                                    <input 
                                                                                        type="date" 
                                                                                        class="form-control" 
                                                                                        id="booking_check_in_date" 
                                                                                        name="booking_check_in_date" 
                                                                                        value="{{ $booking->booking_check_in_date }}" 
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="booking_check_out_date" class="form-label">Booking Check-Out Date</label>
                                                                                    <input 
                                                                                        type="date" 
                                                                                        class="form-control" 
                                                                                        id="booking_check_out_date" 
                                                                                        name="booking_check_out_date" 
                                                                                        value="{{ $booking->booking_check_out_date }}" 
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="booking_guest_number" class="form-label">Guest Number</label>
                                                                                    <input 
                                                                                        type="number" 
                                                                                        class="form-control" 
                                                                                        id="booking_guest_number" 
                                                                                        name="booking_guest_number" 
                                                                                        min="1" 
                                                                                        max="10" 
                                                                                        value="{{ $booking->booking_guest_number }}" 
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group form-check form-switch">
                                                                                    <input type="hidden" name="booking_is_bbq" value="0">
                                                                                    <input 
                                                                                        class="form-check-input" 
                                                                                        type="checkbox" 
                                                                                        id="booking_is_bbq" 
                                                                                        name="booking_is_bbq" 
                                                                                        value="1" 
                                                                                        {{ $booking->booking_is_bbq ? 'checked' : '' }}>
                                                                                    <label class="form-check-label" for="booking_is_bbq">Do you want BBQ?</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="booking_receipt" class="form-label">Upload Payment Receipt</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="file" class="form-control" id="booking_receipt" name="booking_receipt">
                                                                                </div>                                                                            
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                            <label for="download" class="form-label">Uploaded Payment Receipt</label> <p>                                                                               
                                                                                @if($booking->booking_receipt)
                                                                                    <a href="{{ route('download.receipt', $booking->id) }}" class="btn btn-info">
                                                                                        <i class="bi bi-download"></i> Download
                                                                                    </a>
                                                                                @else
                                                                                    <span class="text-muted">No receipt uploaded</span>
                                                                                @endif
                                                                            </div>
                                                        <div class="col-lg-12">
                                                            <button class="btn btn-primary" type="submit">Update Booking</button>
                                                            <a href="../bookinglist" class="btn btn-danger" type="button">Cancel</a>
                                                        </div>
                                                    </div>

                                                    </div>

                                                </div><!-- .bio-block -->
                                            </div><!-- .card-body -->
                                        </div><!-- .card -->


                                    </div><!-- .nk-block -->


                                    
                                                    </form>
                                                </div><!-- .bio-block -->
                                            </div><!-- .card-body -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->


                                </div>
                            </div>
                        </div>
                    </div> <!-- .nk-content -->




@include('Include.footer')
<script>
  $(document).ready(function(){

    var homestayid = @json($booking->homestay_id);

    setTimeout(function() {
      $('#homestay_id').val(homestayid).trigger('change');
    }, 1000);

    $("#homestay_id").change(function(){
      // Get the selected option
      var selectedOption = $(this).find(':selected');

      // Retrieve data attributes from the selected option
      var price = selectedOption.data('price');
      var desc = selectedOption.data('desc');

      console.log(price);

      // Update the values of elements
      $('#homestay_price').val(price);
      $('#homestay_details').val(desc);
    });
  });
</script>

