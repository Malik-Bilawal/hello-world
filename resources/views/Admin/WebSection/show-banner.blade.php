@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/table.css">

<!-- Custom Table -->
  <h2 class="order-list-headings"><span>BANNER</span>LIST</h2>
    <div class="new-div">
        <button onclick="document.location='/add-banner'">ADD NEW BANNER</button>
     </div>
      <div class="table-responsive">

    <table id="customTable">
        <thead>
            <tr>
                <th>Banner Id</th>
                <th>Banner Image</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>
                        <img src="{{ asset('storage/app/public/bannerassets/' . $banner->bannerimage) }}" alt="Banner Image" width="100">
                    </td>
                    <td>
                        <a href="{{ url('/bannerdeleted/' . $banner->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="{{ url('/banneredit/' . $banner->id) }}" class="btn btn-success mb-2">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="pagination"></div>
</div>

<script>
    // Existing pagination and sorting script
</script>
@endsection
