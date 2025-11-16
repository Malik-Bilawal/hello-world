@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/addprop.css">

<div class="con-main">
    <div class="title">ADD A PRODUCT</div>
    <div class="new-div">
        <button onclick="document.location='/show-products'">SHOW AVAILABLE PRODUCT</button>
     </div>
    <form method="POST" id="product_form" action="{{ url('/insert-product') }}" enctype="multipart/form-data">
        @csrf

        <!-- Product Name -->
        <div class="input-box">
            <span class="details">PRODUCT NAME</span>
            <input type="text" placeholder="Enter Your Product Name" required name="proname">
        </div>

        <!-- Original Price -->
        <div class="input-box">
            <span class="details">Current Price</span>
            <input type="number" placeholder="Enter original price" required name="proprice" step="0.01">
        </div>

        <!-- Discount Price -->
        <div class="input-box">
            <span class="details">Old Price (optional)</span>
            <input type="number" placeholder="Enter old Price" required name="prodiscountprice" step="0.01">
        </div>

        <!-- Category Selection -->
        <div class="input-box">
            <span class="details">CATEGORY</span>
            <div class="selection">
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Sizing Chart Selection -->
        {{-- <div class="input-box">
            <span class="details">SIZING CHART</span>
            <div class="selection">
                <select name="sizechart_id" required>
                    <option value="">Select Sizing Chart</option>
                    @foreach ($charts as $chart)
                        <option value="{{ $chart->id }}">{{ $chart->chart_title }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        <!-- Size Selection (Checkboxes) -->
        <div class="input-box" style="display: none">
            <span class="details">Select Sizes</span>
            <div>
                @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size->size }}" id="size{{ $size->id }}" checked>
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
            <input type="text" placeholder="Enter Your Product Description" required name="prodescription">
        </div>

        <!-- Product Images -->
        <div class="input-box">
            <span class="details">PRODUCT IMAGES</span>
            <input type="file" multiple required name="product_images[]" accept="image/*">
        </div>

        <!-- Submit Button -->
        <div class="button">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection
