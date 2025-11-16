@extends('WEBSITE.Components')

@section('web-components')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/WEBSITE/deals_packs.css') }}">

<div class="container-fluid cate-btnsdiv">
    @foreach ($categories as $cat)
        {{-- <button type="button">{{ $cat->category_name }}</button> --}}
    @endforeach
</div>

<section class="more-deals-packs">
    <div class="header">
        <h1>MORE DEALS & PACKS</h1>
        <p>Special Offers on T-Shirt Packs</p>
        <a href="#" class="shop-now">SHOP NOW</a>
    </div>

    @foreach ($categories as $cat)
        <div class="category-container">
            <h2>{{ $cat->category_name }}</h2>
            <div class="deals-container row">
                @foreach ($deals->where('category_id', $cat->id) as $deal)
                    <div class="deal col-lg-3 col-md-4 col-sm-6">
                        @if (!empty($deal->deal_images) && is_array($deal->deal_images))
                            <img class="del-img" src="{{ asset('storage/app/public/dealassets/' . $deal->deal_images[0]) }}" alt="{{ $deal->deal_name }}" width="100">
                        @else
                            <p>No image available</p>
                        @endif
                        <div class="overlay">
                            <p>{{ $deal->deal_name }}</p>
                            <h2>{{ $deal->deal_price }}</h2>
                            <a href="/dealdetail-page/{{ $deal->id }}" class="shop-this">SHOP THIS</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

</section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
