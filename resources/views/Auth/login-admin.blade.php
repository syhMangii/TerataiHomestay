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
        <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="./assets/css/style.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">

<header id="header" class="header d-flex align-items-center sticky-top shadow"
style="background-color: #0d1b2a;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
        <img src="/logokkm.jpeg" style="width:auto; height:100px;" id="navlogo">
        </a>
        <nav id="navmenu" class="navmenu">
            <ul class="nav">
                <li class="nav-item"><a href="/#hero" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="/#about" class="nav-link text-white">About</a></li>
                <li class="nav-item"><a href="/loginusr" class="nav-link text-white">Patient</a></li>
                </ul>
            <i class="mobile-nav-toggle d-xl-none fas fa-bars text-white"></i>
        </nav>
    </div>
</header>
  <!-- Header End -->

  <!-- Root -->
  <div class="nk-app-root">
    <!-- main -->
    <div class="nk-main">
      <div class="nk-wrap align-items-center justify-content-center">
        <div class="container p-2 p-sm-4">

          <div class="wide-xs mx-auto">
            <div class="text-center mb-5">
              <div class="brand-logo mb-1">
                <a href="/loginusr" class="logo-link">
                  <div class="logo-wrap">
                    <img style="width:250px; height:250px;" class="logo-img logo-light" src="logokkm.jpeg" alt="">
                    <img style="width:250px; height:250px;" class="logo-img logo-dark" src="logokkm.jpeg" alt="">
                    <img style="width:250px; height:250px;" class="logo-img logo-icon" src="logokkm.jpeg" alt="">
                  </div>
                </a>
              </div>
            </div>

            @if($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Whoops !</strong> {{ session()->get('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> {{ session()->get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card card-gutter-lg rounded-4 card-auth">
              <div class="card-body">
                <div class="nk-block-head">
                  <div class="nk-block-head-content">
                    <h3 class="nk-block-title mb-1">Login to Account [Admin]</h3>
                    <p class="small">Please sign-in to your account.</p>
                  </div>
                </div>

                <form action="postloginadmin" method="POST" autocomplete="off" aria-autocomplete="off">
                  @csrf
                  <div class="row gy-3">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="username" class="form-label">Email</label>
                        <div class="form-control-wrap">
                          <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="form-control-wrap">
                          <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Login to account</button>
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .nk-main -->
  </div> <!-- .nk-app-root -->
</body>
<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>

</html>