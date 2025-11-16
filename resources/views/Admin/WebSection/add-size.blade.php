@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/Adminpanel/add-form.css') }}">

<div class="containers">
    <div class="form-container">
        <div class="form-header">
            <h2>ADD Size</h2>
        </div>
        <div class="new-div">
            <button onclick="document.location='/show-size'">SHOW AVAILABLE SIZES</button>
         </div> 
        <form action="/sizeinserted" method="POST">
            @csrf
            <div class="form-group">
                <label for="size">Size Name</label>
                <input type="text" class="form-control" name="size" placeholder="Enter Size Name" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
