<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Teratai Anggun Sepintas Homestay</title>
  <meta name="description" content="Discover comfort and tranquility at Teratai Anggun Sepintas Homestay.">
  <meta name="keywords" content="homestay, Teratai Anggun Sepintas, comfortable lodging, vacation">

  <!-- Favicons -->
  <link href="logo.png" rel="icon">
  <link href="logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="Landingpage/assets/css/main.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      line-height: 1.6;
      background: #f9f9f9;
      color: #333;
    }
    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('Images/img2.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 0;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
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

    #navlogo{
        height: 100px !important;
        width: auto !important;
    }

    .header .logo img {
        max-height: 300px !important;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top bg-white shadow">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="/logo.png" style="width:auto; height:300px;" id="navlogo">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul class="nav">
          <li class="nav-item"><a href="#hero" class="nav-link active">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#catalog" class="nav-link">Catalog</a></li>
          <li class="nav-item"><a href="#gallery" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>
          <li class="nav-item"><a href="/faq" target="_blank" class="nav-link">FAQ</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none fas fa-bars"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section d-flex align-items-center justify-content-center">
      <div class="container text-center">
        <h1>Welcome to Teratai Anggun Sepintas Homestay</h1>
        <p>Your tranquil retreat awaits you</p>
        <a href="/loginusr" class="btn btn-primary">Login/Register Now</a>
      </div>
    </section><!-- End Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h2>About Us</h2>
        <p style="text-align: justify;">If you're planning a vacation and searching for a unique and attractive place to stay, D'Teratai Anggun Sepintas is the perfect choice for you! Located at Batu 2 Sepintas, 45200 Sabak, Selangor, this accommodation offers a serene atmosphere amidst lush palm plantations. With a unique concept and various facilities, D'Teratai Anggun promises an unforgettable stay experience. Boasting 29 rooms, including homestay-style homes and triangular chalets, this destination caters to all types of travelers. The charming triangular chalets are especially popular with photography enthusiasts looking to capture beautiful moments. One of the highlights is its two spacious swimming pools, one for adults and another for children, ideal for family relaxation and group activities. Guests can also explore the peaceful surroundings of palm plantations, enjoy a BBQ with loved ones, or simply unwind in this tranquil escape. For more information and reservations, contact D'Teratai Anggun Sepintas at 014-929 7587. Plan your vacation now and indulge in the beauty of nature and comfort at D'Teratai Anggun Sepintas!</p>
      </div>
      <div class="col-lg-6">
        <!-- Bootstrap Carousel for Images -->
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="IMG20210417154436.jpg" class="d-block w-100" alt="About Teratai Anggun Sepintas Homestay">
            </div>
            <div class="carousel-item">
              <img src="IMG20210417154457.jpg" class="d-block w-100" alt="Facilities at Teratai Anggun Sepintas">
            </div>
            <div class="carousel-item">
              <img src="2019-07-26.jpg" class="d-block w-100" alt="Activities at Teratai Anggun Sepintas">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Section -->

<!-- Catalog Section -->
<section id="catalog" class="catalog section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Homestay Catalog</h2>
    <div class="row">
      <!-- Chalet Triangle -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="chalet.jpg" class="card-img-top" alt="Chalet Triangle">
          <div class="card-body">
            <h5 class="card-title">Chalet Triangle</h5>
            <p class="card-text">
            👤Max Capacity 5 People<br>
            🛏️Queen Bed and Single Bed<br>
            ❄️ Air-cond<br>
            🛁 Bathroom<br>
            ⛔No Cooking Allowed<br>
            ♿OKU Friendly
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">RM 250 / night</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Homestay 2 Rooms -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="2rooms.jpeg" class="card-img-top" alt="Homestay 2 Rooms">
          <div class="card-body">
            <h5 class="card-title">Homestay 2 Rooms</h5>
            <p class="card-text">
            👤Max Capacity 10 People<br>
            🛏️Queen Bed and Single Bed<br>
            ❄️ Air-cond<br>
            🛁 Bathroom<br>
            🅿️ Parking for 2 cars<br>
            🪟 Pool View<br>
            🧑‍🍳 Cooking Allowed
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">RM 300 / night</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Homestay 3 Rooms (Aircond in Master Bedroom) -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="3rooms.jpg" class="card-img-top" alt="Homestay 3 Rooms">
          <div class="card-body">
            <h5 class="card-title">Homestay 3 Rooms</h5>
            <p class="card-text">
            👤Max Capacity 15 People<br>
            🛏️Queen Bed and Single Bed<br>
            ❄️ Air-cond<br>
            🛁 2 Bathroom<br>
            🅿️ Parking for 2 cars<br>
            🪟 Field View<br>
            🧑‍🍳 Cooking Allowed
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">RM 450 / night</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Homestay 3 Rooms (Aircond in Living Room) -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="family6.png" class="card-img-top" alt="Homestay 3 Rooms">
          <div class="card-body">
            <h5 class="card-title">Family Day Package</h5>
            <p class="card-text">
            👤Max Capacity : 50-130 People<br>
            🏠Book All Homestay : <br>
            🛖Chalet Triangle 7 Unit<br>
            🏠Homestay 2 Room 2 Unit<br>
            🏠Homestay 3 Room 6 Unit<br><br>

            Facilities :<br>
            ⛳Sports field <br> 
            🏀Sports equipment <br> 
            🚴Bicycles <br> 
            🕌Prayer room (Surau)  <br>
            ♨️BBQ equipment, tables, and chairs
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price">RM 450 / night</span>
            </div>
          </div>
        </div>
      </div>
      
</div>

    </div>
  </div>
</section>
<!-- End Catalog Section -->

<!-- Gallery Section -->
<section id="gallery" class="gallery section py-5">
<h2 class="text-center mb-4">Gallery</h2>

  <div class="container d-flex justify-content-center">

    <!-- Gallery Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px; width: 100%; height: 400px;">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>

      <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="family8.png" class="d-block w-100 h-100" alt="Family Day Package" style="object-fit: cover;">
        </div>
      <div class="carousel-item">
          <img src="family1.jpg" class="d-block w-100 h-100" alt="Family Day Package" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
          <img src="family3.jpeg" class="d-block w-100 h-100" alt="Family Day Package" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
          <img src="family4.png" class="d-block w-100 h-100" alt="Family Day Package" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
          <img src="family7.png" class="d-block w-100 h-100" alt="Family Day Package" style="object-fit: cover;">
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>



    <!-- Contact Section -->
    <section id="contact" class="contact section py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>
        <p class="text-center mb-4">We’d love to hear from you! Reach out to us for inquiries, bookings, or further information.</p>
        <div class="row">
          <div class="col-lg-5">
            <div class="info">
              <p><i class="fas fa-map-marker-alt text-primary"></i> Address: Teratai anggun sepintas, Sabak, Malaysia, 45200.</p>
              <p><i class="fas fa-phone text-primary"></i> Phone: +60 14-929 7587</p>
              <p><i class="fas fa-envelope text-primary"></i> Email: info@terataihomestay.my</p>
            </div>
          </div>
          <div class="col-lg-7">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.1061641923916!2d101.0075202!3d3.7870666999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb67cf3cf2300d%3A0xd5b84147ffd75cc7!2sTeratai%20Anggun%20Sepintas!5e0!3m2!1sen!2smy!4v1736818057661!5m2!1sen!2smy" width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main>

  <footer id="footer" class="footer text-center">
    <div class="container">
      <p>&copy; 2025 Teratai Anggun Sepintas Homestay. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
