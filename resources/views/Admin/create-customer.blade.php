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
                                                            <h3 class="title mb-1" style="color:blue;"><u>CREATE NEW CUSTOMER</u></h3>


                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head-content -->

                                            </div><!-- .nk-block-head-between -->
                                        </div><!-- .nk-block-head -->
                                    </div><!-- .nk-block-head -->
                                

                                    {!! Form::open(array('url' => 'storeCustomer','method'=>'POST')) !!}
                                    <div class="nk-block">
                                        <div class="card card-gutter-md">
                                            <div class="card-body">

@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops !</strong>  {{ session()->get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>  {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
                                                <div class="bio-block">
                                                    <h4 class="bio-block-title mb-4" style="color:blue;"><u>1. CUSTOMER INFORMATION</u></h4>
                                                    <div class="row g-3">
                                                     
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="lastname" class="form-label">Name</label>
                                                                <div class="form-name-wrap">
                                                                <input type="text" class="form-control" id="name" name="name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="username" class="form-label">Username</label>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="username" name="username" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="email" class="form-label">Email</label>
                                                                <div class="form-control-wrap">
                                                                <input type="email" class="form-control" id="email" name="email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="phone" class="form-label">Phone</label>
                                                                <div class="form-control-wrap">
                                                                <input type="number" class="form-control" id="phone" name="phone" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <button class="btn btn-primary" type="submit">Submit</button>
                                                            <a href="../customers" class="btn btn-danger" type="button">Cancel</a>
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
