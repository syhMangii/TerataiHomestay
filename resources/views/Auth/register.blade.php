<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Teratai Anggun Sepintas</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="icon" type="image/x-icon" href="img/mpa logo.png">
    <link rel="stylesheet" href="./assets/css/style.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <!-- Root  -->
    <div class="nk-app-root">
        <!-- main  -->
        <div class="nk-main">
            <div class="nk-wrap align-items-center justify-content-center">
                <div class="container p-2 p-sm-4">
                <a href="/" class="btn btn-warning" type="button">Home</a>
                <a href="/loginusr" class="btn btn-success" type="button">Customer</a>
                    <div class="wide-xs mx-auto">
                        <div class="text-center mb-5">
                            <div class="brand-logo mb-1">
                            <a href="/loginusr" class="logo-link">
                            <div class="logo-wrap">
                                    <img style="width:250px; height:250px;" class="logo-img logo-light" src="logo.png" srcset="logo.png 2x"  alt="">
                                        <img style="width:250px; height:250px;" class="logo-img logo-dark" src="logo.png" srcset="logo.png 2x" alt="">
                                        <img style="width:250px; height:250px;" class="logo-img logo-icon" src="logo.png" srcset="logo.png 2x" alt="">
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                        @if($message = Session::get('errors'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops !</strong>  {{ session()->get('errors') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>  {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
                        <div class="card card-gutter-lg rounded-4 card-auth">
                            <div class="card-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title mb-1">Create New Account</h3>
                                        <p class="small">Use your email to continue with Booking System !</p>
                                    </div>
                                </div>




                                <form action="postregisterusr" method="POST" autocomplete="off" aria-autocomplete="off">
                                            @csrf
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cpassword" class="form-label">Confirm Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                                                </div>
                                            </div><!-- .form-group -->
                                        </div>
                                    
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Register</button>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </form>
                                <div class="my-3 text-center">
                                    <h6 class="overline-title overline-title-sep"><span>OR</span></h6>
                                </div>
                                <div class="row g-2">
                                <div class="col-12">
                                            <div class="d-grid">
                                               <a href="/loginusr"> <button style="width:100%;" class="btn btn-secondary" type="submit">Login</button></a>
                                            </div>
                                        </div>
                                </div><!-- .row -->
                            </div><!-- .card-body -->
                        </div><!-- .card -->
                        
                    </div><!-- .col -->
                </div><!-- .container -->
            </div>
        </div> <!-- .nk-main -->
    </div> <!-- .nk-app-root -->
</body>
<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>

</html>