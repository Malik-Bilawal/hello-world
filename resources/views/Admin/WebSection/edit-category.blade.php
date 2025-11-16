@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/adminpanel/update.css">

<form action="/categoryupdated/{{ $category->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="categoryname">Category Name</label>
        <input type="text" name="categoryname" id="categoryname" class="form-control" value="{{ $category->category_name }}" required>
    </div>

    <div class="form-group">
        <label for="cateimage">Category Image</label>
        <input type="file" name="cateimage" id="cateimage" class="form-control" required>

        @if($category->cateimage)
            <img src="{{ asset('storage/app/public/categoryassets/' . $category->cateimage) }}" alt="Category Image" width="100">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Category</button>
</form>


@endsection
