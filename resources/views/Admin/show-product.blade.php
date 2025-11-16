@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/table.css">

<!-- !PAGE CONTENT! -->

<!-- Custom Table -->
   <h2 class="order-list-headings"><span>PRODUCT</span> LIST</h2>
<div class="new-div">
    <button onclick="document.location='/add-product'">ADD NEW PRODUCTS</button>
 </div>
   <div class="table-responsive">

  <table id="customTable">
        <thead>
            <tr>
                <th>S.no</th>
                <th>PR NAME</th>
                <th>PR PRICE</th>
                <th>PR Discount PRICE</th>
                {{-- <th>PR SIZING CHART</th> --}}
                <th>PR CATEGORY</th>
                <th>PR DESCRIPTION</th>
                <th>PR IMAGES</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $pro)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_price }}</td>
                    <td>{{ $pro->product_discount_price }}</td>
                    {{-- <td>{{ $pro->sizechart_id }}</td> --}}
                    <td>{{ $pro->category_id }}</td>
                    <td style=" max-height: 95px; min-width: 290px;">{{ $pro->product_description }}</td>
     <td>
         @if (!empty($pro->product_images) && is_array($pro->product_images))
                <img class="img-fluid" src="{{ asset('storage/app/public/productassets/' . $pro->product_images[0]) }}" alt="{{ $pro->product_name }}" width="100">
            @else
                <p>No image available</p>
            @endif

</td>



                    <td>
                        <a href="/delete-product/{{ $pro->id }}" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="/edit-product/{{ $pro->id }}" class="btn btn-success">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
