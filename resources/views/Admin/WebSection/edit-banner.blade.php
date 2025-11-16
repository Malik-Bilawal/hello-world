@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/adminpanel/edit-banner.css">

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>EDIT BANNER</h2>
        </div>
<form action="{{ url('/bannerupdated/' . $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="bannerimage">BANNER IMAGE</label>
        <input type="file" class="form-control" name="bannerimage">

        @if($banner->bannerimage)
            <img src="{{ asset('storage/app/public/bannerassets/' . $banner->bannerimage) }}" alt="Banner Image" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-block">Update Banner</button>
</form>

    </div>
</div>

@endsection
