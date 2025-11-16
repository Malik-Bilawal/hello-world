@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="{{ asset('css/Adminpanel/addprop.css') }}">
<div class="con-main">
    <div class="title">EDIT DEAL</div>
    <form method="POST" id="deal_form" action="/update-deal/{{ $deal->id }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="input-box">
            <span class="details">DEAL NAME</span>
            <input type="text" value="{{ old('deal_name', $deal->deal_name) }}" placeholder="Enter Your Deal Name" required name="deal_name">
        </div>

        <div class="input-box">
            <span class="details">Original Price</span>
            <input type="number" value="{{ old('deal_price', $deal->deal_price) }}" placeholder="Enter Before Price (OPTIONAL)" required name="deal_price">
        </div>

        <div class="input-box">
            <span class="details">Discount Price</span>
            <input type="number" value="{{ old('deal_discount_price', $deal->deal_discount_price) }}" placeholder="Enter After Price" name="deal_discount_price">
        </div>

        <div class="input-box">
            <span class="details">CATEGORY</span>
            <div class="selection">
                <select name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $deal->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="input-box">
            <span class="details">SIZING CHART</span>
            <div class="selection">
                <select name="sizechart_id" required>
                    @foreach ($charts as $chart)
                        <option value="{{ $chart->id }}" {{ $chart->id == $deal->sizechart_id ? 'selected' : '' }}>
                            {{ $chart->chart_title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="input-box">
            <span class="details">DEAL DESCRIPTION</span>
            <input type="text" value="{{ old('deal_description', $deal->deal_description) }}" placeholder="Enter Your Deal Description" required name="deal_description">
        </div>

        <!-- Size Selection (Checkboxes) -->
        <div class="input-box">
            <span class="details">Select Sizes</span>
            <div>
                @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size->size }}" id="size{{ $size->id }}"
                            {{ in_array($size->size, json_decode($deal->sizes, true)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="size{{ $size->id }}">
                            {{ $size->size }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="input-box">
            <span class="details">DEAL IMAGES</span>
            <input type="file" multiple name="deal_images[]" accept="image/*">
            <h5>old images</h5>
            @if (!empty($deal->deal_images))
                <div class="current-images">
                    @foreach (json_decode($deal->deal_images) as $image)
                        <img src="{{ asset('storage/app/public/dealassets/' . $image) }}" alt="Deal Image">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="button">
            <input type="submit" value="Update">
        </div>
    </form>
</div>
@endsection
