@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/website.css">

<section class="pages-section">
    <h2>Website Management</h2>
    <p>Select a section to manage:</p>
    <div class="pages-divs">
        <a href="/show-category" >Manage Categories</a>
        <a href="/show-banner" >Manage Banner</a>
        {{-- <a href="/show-policies">Manage Policy</a>
          <a href="/show-chart">Manage Chart</a>
         <a href="/show-size" >Manage Size</a> --}}
    </div>

  


</section>
@endsection
