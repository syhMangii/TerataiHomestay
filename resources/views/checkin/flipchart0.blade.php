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

          
</div>

@include('Include.footer') <!-- Your footer -->
