@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/add-form.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<div class="containers">
    <div class="form-container">
        <div class="form-header">
            <h2>ADD BANNER</h2>
        </div>

        <div class="new-div">
            <button onclick="document.location='/show-banner'">SHOW AVAILABLE BANNER </button>
         </div>  

        <form action="/bannerinserted" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bannerimage">BANNER IMAGE</label>
                <input type="file" class="form-control" name="bannerimage" placeholder="Enter Banner Image" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
