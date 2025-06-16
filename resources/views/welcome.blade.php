<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>KKM Daily Wellness Tracker - Patient Login</title>
    <link rel="icon" type="image/x-icon" href="logokkm.jpeg">
    <link rel="stylesheet" href="./assets/css/style.css?v1.1.1">
    <style>
  body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    background: #10183b;
    color: #333;
  }

  .hero {
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .hero h1 {
    font-size: 3rem;
    font-weight: 700;
  }

  /* Mobile view: show smaller, not covered by header */
  @media (max-width: 768px) {
    .hero {
      height: 40vh !important;
      background-size: contain !important; /* <-- to show full photo */
      background-repeat: no-repeat;
      background-position: center;
    }
  }

  /* Web/Desktop view: show full image properly */
  @media (min-width: 769px) {
    #about-text {
      padding-top: 30px !important;
      padding-bottom: 30px !important;
    }
    .hero {
      background-size: contain !important;
      background-repeat: no-repeat;
      background-position: center;
      height: auto !important;
      padding-top: 56.25%; /* fallback for 16:9 ratio */
      position: relative;
    }

    .hero::before {
      content: "";
      display: block;
      padding-top: 56.25%;
    }

    .hero > * {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }

    .section {
      padding-top: 30px !important;
      padding-bottom: 30px !important;
    }
    .hero,
    .about {
      padding-top: 0 !important;
      padding-bottom: 0 !important;
    }
  }

  .btn-primary {
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-primary:hover {
    background-color: #138496;
    border-color: #117a8b;
  }

  .about img {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .contact .info p {
    margin-bottom: 10px;
  }

  .footer {
    background: #17a2b8;
    color: white;
    padding: 20px 0;
  }

#navlogo {
    height: 100px; /* Default size */
}

@media (max-width: 768px) {
    #navlogo {
        height: 50px; /* Smaller on mobile */
    }
}


  .header .logo img {
    max-height: 300px !important;
  }

  header.header {
    z-index: 1000;
    position: sticky;
    top: 0;
  }

  main.main {
    position: relative;
    z-index: 1;
  }
</style>

</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<header id="header" class="header d-flex align-items-center sticky-top shadow"
    style="background-color: #0d1b2a;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="/logokkm.jpeg" id="navlogo">
        </a>
        <nav id="navmenu" class="navmenu">
            <ul class="nav">
                <!-- <li class="nav-item"><a href="/#hero" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="/#about" class="nav-link text-white">About</a></li> -->
                <li class="nav-item"><a href="/loginusr" class="nav-link text-white">Login</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none fas fa-bars text-white"></i>
        </nav>
    </div>
</header>

    <!-- Header End -->

    <main class="main">

<!-- Hero Section -->
<section class="hero section d-flex align-items-center justify-content-center text-center"
  style="background-image: url('/hero.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 60vh; width: 100%;">
</section>

<!-- About Text Section -->
<section id="about-text" class="about section py-5 ">
  <div class="container text-center text-white">
    <h1>NiQuiTeen</h1>
    <p>Empowering patients with daily check-ins, healthy habits, and progress tracking.</p>
    <a href="/loginusr" class="btn btn-primary">Login/Register Now</a>
  </div>
</section>


</main>


  <footer id="footer" class="footer text-center">
    <div class="container">
      <p>&copy; 2025 KKM. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>