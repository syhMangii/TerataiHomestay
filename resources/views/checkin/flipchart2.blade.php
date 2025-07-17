@include('Include.app') <!-- Your header -->

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center">
  <div class="row justify-content-center mb-4">
    <div class="col-12 col-md-8 col-lg-6">
      <!-- Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide">
        <!-- Indicators -->
        <div class="carousel-indicators">
          @for ($i = 0; $i < 21; $i++)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                    @if ($i === 0) class="active" aria-current="true" @endif
                    aria-label="Slide {{ $i + 1 }}"></button>
          @endfor
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
          @for ($i = 1; $i <= 21; $i++)
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
<div class="text-center mt-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quizModal">
        📘 Answer Quiz to be Mark as Read 
    </button>
</div>
@endif
</div>

@if (!$isRead)
<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('slides.submit-quiz') }}" method="POST">
      @csrf
      <div class="modal-content text-dark"> <!-- Ensure modal content text is black -->
        <div class="modal-header text-dark">
          <h5 class="modal-title" id="quizModalLabel">Flipchart Quiz</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
            @foreach($questions as $q)
                <div class="mb-4">
                    <strong>Q{{ $loop->iteration }}: {{ $q['question'] }}</strong><br>
                    @foreach($q['options'] as $key => $label)
    <label class="text-dark">
        <input type="radio" name="answers[{{ $q['id'] }}]" value="{{ $key }}" required>
        {{ $label }}
    </label><br>
@endforeach

                </div>
            @endforeach
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif


@if ($quizResult === 'pass' || $quizResult === 'fail')
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="resultModalLabel">
          {{ $quizResult === 'pass' ? 'Congrats!' : 'Try Again.' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center text-dark">
        @if ($quizResult === 'pass')
            <p>You’ve passed the quiz and have been marked as read ✅</p>
        @else
            <p>You must answer at least 3 questions correctly. Please try again. ❌</p>
        @endif

        <p>You got <strong>{{ session('quiz_score') }}/5</strong> correct.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="resultOkayBtn">OK</button>
      </div>
    </div>
  </div>
</div>
@endif

@include('Include.footer') <!-- Your footer -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    @if ($quizResult === 'pass' || $quizResult === 'fail')
      const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
      resultModal.show();

      document.getElementById('resultOkayBtn').addEventListener('click', function () {
        resultModal.hide();

        @if ($quizResult === 'fail')
          const carouselElement = document.getElementById('carouselExampleIndicators');
          const carousel = bootstrap.Carousel.getInstance(carouselElement);
          carousel.to(0); // Go to first slide
        @endif
      });
    @endif
  });
</script>