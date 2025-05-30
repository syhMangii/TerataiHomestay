@include('Include.app') <!-- Your header -->

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center">
  <div class="row justify-content-center mb-4">
    <div class="col-12 col-md-8 col-lg-6">
      <!-- Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide">
        <!-- Indicators -->
        <div class="carousel-indicators">
          @for ($i = 0; $i < 19; $i++)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                    @if ($i === 0) class="active" aria-current="true" @endif
                    aria-label="Slide {{ $i + 1 }}"></button>
          @endfor
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
          @for ($i = 1; $i <= 19; $i++)
            <div class="carousel-item @if ($i === 1) active @endif">
              <img src="/manuals/{{ $i }}.png" class="d-block w-100 img-fluid">
            </div>
          @endfor
        </div>

        <!-- Controls -->
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
  </div>

  @if (!$isRead)
  <!-- Confirmation Form Row -->
  <div class="row justify-content-center mt-4">
    <div class="col-12 col-md-6 text-center">
      <div id="confirmationForm" class="d-none">
        <form method="POST" action="{{ route('slides.confirm-read') }}" id="confirmReadForm">
          @csrf
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="confirmCheckbox" required>
            <label class="form-check-label" for="confirmCheckbox">
              I have read all of these
            </label>
          </div>
          <button type="submit" class="btn btn-success">Confirm</button>
        </form>
      </div>
    </div>
  </div>
  @endif
</div>

@include('Include.footer') <!-- Your footer -->

<script>
  const carousel = document.getElementById('carouselExampleIndicators');
  const confirmationForm = document.getElementById('confirmationForm');

  carousel.addEventListener('slid.bs.carousel', function (event) {
    // Indexing starts from 0, so 18 is the 19th slide
    if (event.to === 18) {
      confirmationForm.classList.remove('d-none');
    } else {
      confirmationForm.classList.add('d-none');
    }
  });
</script>
