@include('Include.app')

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
                                                            <h3 class="title mb-1" style="color:blue;"><u>VIEW BOOKING</u></h3>


                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head-content -->

                                            </div><!-- .nk-block-head-between -->
                                        </div><!-- .nk-block-head -->
                                    </div><!-- .nk-block-head -->
                                

                                    {!! Form::model($booking, ['url' => ['updateBooking', $booking->id], 'method' => 'POST']) !!}
                                                    @csrf
                                    <div class="nk-block">
                                        <div class="card card-gutter-md">
                                            <div class="card-body">
                                                <div class="bio-block">
                                                    <h4 class="bio-block-title mb-4" style="color:blue;"><u>1. HOMESTAY INFORMATION</u></h4>
                                                    <div class="row g-3">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="firstname" class="form-label">Homestay</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control" name="homestay_id" id="homestay_id" disabled>
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
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="homestay_price" class="form-label">Price</label>
                                                                <div class="form-control-wrap">
                                                                <input type="number" step="0.01" class="form-control" id="homestay_price" name="homestay_price" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="homestay_details" class="form-label">Homestay Details</label>
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
                                                                <label for="lastname" class="form-label">Booking Date</label>
                                                                <div class="form-control-wrap">
                                                                <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ $booking->booking_date }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="remarks" class="form-label">Booking Description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" maxlength="1000" rows="10" name="booking_description" id="booking_description" disabled>{{ $booking->booking_description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                          
                                                            <a href="../homeusr" class="btn btn-danger" type="button">Cancel</a>
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
      var selectedOption = $(this).find(':selected');

      var price = selectedOption.data('price');
      var desc = selectedOption.data('desc');

      $('#homestay_price').val(price);
      $('#homestay_details').val(desc);
    });
  });
</script>

