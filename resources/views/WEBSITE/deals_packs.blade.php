@extends('WEBSITE.Components')

@section('web-components')
<section class="banner-section">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/WEBSITE/deals_packs.css') }}">

    <div class="header-container">
        <h1>DEALS & PACKS</h1>
    </div>

    <div class="container-fluid cate-btnsdiv">
        @foreach ($categories as $cat)
            {{-- <button type="button">{{ $cat->category_name }}</button> --}}
        @endforeach
    </div>

    <section class="more-deals-packs">
        @foreach ($categories as $cat)
              <!-- Display category name -->
        <div class="deals-container col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12">
                @foreach ($deals->where('category_id', $cat->id) as $deal)
                <div class="deal col-lg-4 col-xl-4 col-xxl-4 col-md-10 col-sm-10 col-12">
                    @if (!empty($deal->deal_images) && is_array($deal->deal_images))
                    <img class="del-img" src="{{ asset('storage/app/public/dealassets/' . $deal->deal_images[0]) }}" alt="{{ $deal->deal_name }}" width="100">
                    @else
                    <p>No image available</p>
                    @endif
                    <div class="overlay">
                         <p>{{ $deal->deal_name }}</p>
            <div style="display: none">
                <h2 class="org-price" style="text-decoration: line-through">{{ $deal->deal_price }}</h2>
                <h2 class="discount-price">{{ $deal->deal_discount_price }}</h2>

            </div>
            <h2 class="percent">% OFF</h2>
                <a href="/dealdetail-page/{{ $deal->id }}" class="shop-this">SHOP THIS</a>
        </div>
    </div>
                @endforeach
           </div>
        @endforeach
    </section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
    function showpercent() {
        // Get all the elements with the respective class names
        var orgprices = document.getElementsByClassName("org-price");
        var disprices = document.getElementsByClassName("discount-price");
        var percents = document.getElementsByClassName("percent");

        // Loop through all the deals and calculate the percentage for each one
        for (var i = 0; i < orgprices.length; i++) {
            var orgprice = parseFloat(orgprices[i].innerHTML); // Get original price
            var disprice = parseFloat(disprices[i].innerHTML); // Get discount price

            if (orgprice && disprice) {
                var per = (orgprice - disprice) / orgprice * 100; // Calculate percentage
                percents[i].innerHTML = "GET " + per.toFixed(2) + "% OFF"; // Update percentage in the card
            } else {
                percents[i].innerHTML = "N/A"; // If prices are invalid
            }
        }
    }

    // Call showpercent when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        showpercent();
    });
</script>
