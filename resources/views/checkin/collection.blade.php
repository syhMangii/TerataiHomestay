@include('Include.app') <!-- Your header -->
<style>
    .badge-img {
        width: 80px;
        transition: all 0.3s ease;
    }

    @media (min-width: 768px) {
        .badge-img {
            width: 120px; /* Bigger on laptop/tablet and above */
        }
    }

    .text-gold {
        color: gold;
        font-size: 0.75rem;
    }

    .badge-label {
        font-size: 0.75rem;
    }

    @media (min-width: 768px) {
        .badge-label {
            font-size: 0.85rem;
        }
    }
</style>

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

            <div class="col-4 d-flex flex-column align-items-center my-2 text-center">
                <img src="{{ asset($path) }}" alt="{{ $badge->name }}" title="{{ $badge->description }}" class="badge-img">
                <p class="badge-label mb-0 {{ $earned ? 'text-gold' : 'text-white' }} text-nowrap">{{ $badge->name }}</p>
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
