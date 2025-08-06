<!-- travelers section start -->

@php
    $most_villas = \App\Models\Villa::withCount('bookings') // Count the number of bookings for each villa
        ->orderByDesc('bookings_count')// Order by the count in descending order (most bookings first)
         ->where('status','active')
        ->get();

    $popular_villas = \App\Models\Villa::withCount('bookings')
         ->where('status','active')
        ->get();
@endphp

<section class="section container">
    <div class="section-box">
        <h2 class="section-title">{{ __('Popular with travelers from Arab') }}</h2>
    </div>

    <ul class="travel-tabs" role="tablist">
        <li class="travel-tab" role="presentation">
            <button class="travel-tab-button active" id="featured-tab" data-bs-toggle="tab"
                    data-bs-target="#featured" type="button" role="tab" aria-controls="featured"
                    aria-selected="true">
                {{ __('Popular Villas and Apartments') }}
            </button>
        </li>
        <li class="travel-tab" role="presentation">
            <button class="travel-tab-button" id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending"
                    type="button" role="tab" aria-controls="trending" aria-selected="false">
                {{ __('Most Booked Villas and Apartments') }}
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
            <div class="travel-items">
                @foreach($popular_villas as $villa)
                    <div class="travel-item">
                        <div class="title">{{ $villa->title }}</div>
                        <div class="text">{{ $villa->bookings->count() ?? 0 }} {{ __('visits and activities') }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
            <div class="travel-items">
                @foreach($most_villas as $data)
                    <div class="travel-item">
                        <div class="title">{{ $data->title }}</div>
                        <div class="text">{{ $data->bookings_count ?? 0 }} {{ __('visits and activities') }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- travelers section end -->
