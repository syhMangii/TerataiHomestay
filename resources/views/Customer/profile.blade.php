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
                    <h2 class="nk-block-title">My Profile</h1>
                </div>
                <div class="nk-block-head-content">
                </div>
            </div><!-- .nk-block-head-between -->
        </div><!-- .nk-block-head -->
       
            <div class="card card-gutter-lg rounded-4 card-auth">
                            <div class="card-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title mb-1">Profile</h3>
                                        <p class="small">Keep your Profile up to date!</p>
                                    </div>
                                </div>
            <form action="updProfile" method="POST" autocomplete="off" aria-autocomplete="off">
                                            @csrf
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ auth()->user()->name }}" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{ auth()->user()->username }}" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{ auth()->user()->email }}" disabled>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ auth()->user()->phone }}" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </form>


            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
</div>
</div>
</div> <!-- .nk-content -->
@include('Include.footer')