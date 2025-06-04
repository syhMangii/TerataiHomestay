@include('Include.app') <!-- Your header -->
<br>
<br>
<div class="container my-4 mt-5">
              <h5 class="text-center mb-1 fs-7">Badges</h5>

    @php
        $badgeCount = 0;
    @endphp

    <div class="row justify-content-center">
        @foreach ($badges as $i => $badge)
            @php
                $earned = $user->badges->contains($badge->id);
                $path = $earned ? "badges/c/{$badge->image_name}" : "badges/bw/{$badge->image_name}";
                $badgeCount++;
            @endphp

            <div class="col-4 d-flex justify-content-center my-2">
                <img src="{{ asset($path) }}" alt="{{ $badge->name }}" title="{{ $badge->description }}" width="80">
            </div>

            @if (in_array($badgeCount, [2, 4, 7, 14]))
                </div><hr><div class="row justify-content-center">
            @endif
        @endforeach
    </div>
</div>

<!-- Sponsor Section -->
<div class="text-center mt-2 mb-3">
    <figure>
        <blockquote class="blockquote">
            <p>Enjoy Rewards Powered</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            <cite title="Source Title">by Zus Coffee</cite>
        </figcaption>
    </figure>
    <img src="zus-logo.png" alt="Zus Coffee Logo" class="img-fluid" style="max-height: 180px;">
</div>

@include('Include.footer') <!-- Your footer -->
