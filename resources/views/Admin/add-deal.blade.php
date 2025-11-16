@extends('Admin.admin-components')

@section('admincomponents')


<link rel="stylesheet" href="css/Adminpanel/addprop.css">
<div class="con-main">
    <div class="title">ADD A DEAL</div>
    <div class="new-div">
        <button onclick="document.location='/show-deals'">SHOW AVAILABLE DEALS</button>
     </div>
    <form method="POST" id="deal_form" action="/insert-deal" enctype="multipart/form-data">
        @csrf

        <div class="input-box">
            <span class="details">DEAL NAME</span>
            <input type="text" placeholder="Enter Your Deal Name" required name="deal_name">
        </div>

        <div class="input-box">
            <span class="details">Current Price</span>
            <input type="number" placeholder="Enter current price" required name="deal_price">
        </div>

        <div class="input-box">
            <span class="details">Discount Price</span>
            <input type="number" placeholder="Enter discount Price like 200 , 300" required name="deal_discount_price">
        </div>

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

        <div class="input-box">
            <span class="details">SIZING CHART</span>
            <div class="selection">
                <select name="sizechart_id" required>
                    <option value="">Select Sizing Chart</option>
                    @foreach ($charts as $chart)
                        <option value="{{ $chart->id }}">{{ $chart->chart_title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Size Selection (Checkboxes) -->
        <div class="input-box">
            <span class="details">Select Sizes</span>
            <div>
                @foreach($sizes as $size)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size->size }}" id="size{{ $size->id }}">
                        <label class="form-check-label" for="size{{ $size->id }}">
                            {{ $size->size }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="input-box">
            <span class="details">DEAL DESCRIPTION</span>
            <input type="text" placeholder="Enter Your Deal Description" required name="deal_description">
        </div>

        <div class="input-box">
            <span class="details">DEAL IMAGES</span>
            <input type="file" multiple required name="deal_images[]" accept="image/*">
        </div>

        <div class="button">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection
