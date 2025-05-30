@include('Include.app') <!-- Your header -->
<style>
  .hero {
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 100px; /* instead of padding, use margin */
  }

  /* Mobile view */
  @media (max-width: 768px) {
  .hero {
    height: 40vh !important;
    background-size: contain !important; /* show whole photo without crop */
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 50px;
  }
}


  /* Desktop view */
  @media (min-width: 769px) {
    .hero {
      background-size: contain !important;
      background-repeat: no-repeat;
      background-position: center;
      height: auto !important;
      aspect-ratio: unset;
      margin-top: 10px; /* same margin on desktop */
      position: relative;
    }

    .hero::before {
      content: "";
      display: block;
      padding-top: 56.25%; /* for image ratio */
    }

    .hero > * {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }
  }
</style>

<main class="main">

<!-- About Image Section -->
<section class="hero section d-flex align-items-center justify-content-center text-center"
  style="background-image: url('/aboutus.jpeg');">
</section>

</main>

@include('Include.footer') <!-- Your footer -->
