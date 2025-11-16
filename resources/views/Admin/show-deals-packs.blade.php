@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/table.css">

<!-- !PAGE CONTENT! -->

<!-- Custom Table -->
   <h2 class="order-list-headings"><span>DEAL</span> LIST</h2>
     <div class="new-div">
        <button onclick="document.location='/add-deal'">ADD NEW DEALS</button>
    </div>
     <div class="table-responsive">
    <table id="customTable">
        <thead>
            <tr>
                <th>S.no</th>
                <th>DEAL NAME</th>
                <th>REGULAR PRICE</th>
                <th>DISCOUNT PRICE</th>
                <th>DESCRIPTION</th>
                <th>CATEGORY</th>
                <th>SIZING CHART</th>
                <th>DEAL IMAGES</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deals as $index => $deal)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $deal->deal_name }}</td>
                    <td>{{ $deal->deal_price }}</td>
                    <td>{{ $deal->deal_discount_price }}</td>
                    <td style=" max-height: 95px;min-width: 290px;">{{ $deal->deal_description }}</td>
                    <td>{{ $deal->category->category_name }}</td>
                    <td>{{ $deal->sizechart->id }}</td>
                    <td>
     @if (!empty($deal->deal_images) && is_array($deal->deal_images))
                <img class="img-fluid" src="{{ asset('storage/app/public/dealassets/' . $deal->deal_images[0]) }}" alt="{{ $deal->deal_name }}" width="100">
            @else
                <p>No image available</p>
            @endif

                    </td>
                    <td>
                        <a href="/delete-deal/{{ $deal->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this deal?')">Delete</a>
                    </td>
                    <td>
                        <a href="/edit-deal/{{ $deal->id }}" class="btn btn-success">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
