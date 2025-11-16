@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="{{ asset('css/Adminpanel/addprop.css') }}">


<div class="con-main">
    <div class="title">EDIT PRODUCT</div>
    <form method="POST" id="product_form" action="{{ url('/update-product/' . $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="input-box">
            <span class="details">PRODUCT NAME</span>
            <input type="text" value="{{ old('proname', $product->product_name) }}" placeholder="Enter Your Product Name" required name="proname">
        </div>

        <!-- Original Price -->
        <div class="input-box">
            <span class="details">Original Price</span>
            <input type="number" value="{{ old('proprice', $product->product_price) }}" placeholder="Enter Before Price" required name="proprice" step="0.01">
        </div>

        <!-- Discount Price -->
        <div class="input-box">
            <span class="details">Discount Price</span>
            <input type="number" value="{{ old('prodiscountprice', $product->product_discount_price) }}" placeholder="Enter After Price" required name="prodiscountprice" step="0.01">
        </div>

        <!-- Sizing Chart Selection -->
        {{-- <div class="input-box">
            <span class="location details">SIZING CHARTS</span>
            <div class="selection">
                <select name="sizechart_id" required>
                    @foreach ($charts as $chart)
                        <option value="{{ $chart->id }}" {{ $chart->id == $product->sizechart_id ? 'selected' : '' }}>
                            {{ $chart->chart_title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        <!-- Category Selection -->
        <div class="input-box">
            <span class="location details">SELECT CATEGORY</span>
            <div class="selection">
                <select name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Size Selection (Checkboxes) -->
        <div class="input-box" style="display: none">
            <span class="details">Select Sizes</span>
            <div>
                @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked name="sizes[]" value="{{ $size->size }}" id="size{{ $size->id }}"
                        @if(in_array($size->size, $product->available_sizes ?? [])) checked @endif>
                        <label class="form-check-label" for="size{{ $size->id }}">
                            {{ $size->size }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Product Description -->
        <div class="input-box">
            <span class="details">PRODUCT DESCRIPTION</span>
            <input type="text" value="{{ old('prodescription', $product->product_description) }}" placeholder="Enter Your Product Description" required name="prodescription">
        </div>

        <!-- Product Images -->
        <div class="input-box">
            <span class="details">PRODUCT IMAGES</span>
            <input type="file" multiple name="product_images[]" accept="image/*">
            <h5>old images</h5>
            @if (!empty($product->product_images))
                <div class="current-images">
                    @foreach (json_decode($product->product_images) as $image)
                        <img src="{{ asset('storage/app/public/productassets/' . $image) }}" alt="Product Image" width="100">
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="button">
            <input type="submit" value="Update">
        </div>
    </form>
</div>
@endsection
