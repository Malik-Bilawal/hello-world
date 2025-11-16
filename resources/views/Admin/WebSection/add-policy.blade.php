@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/add-form.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="containers">
    <div class="form-container">
        <div class="form-header">
            <h2>ADD POLICY</h2>
        </div>
        <div class="new-div">
            <button onclick="document.location='/show-policies'">SHOW AVAILABLE POLICIES</button>
         </div> 
        <form action="/policyinserted" method="POST">
            @csrf
            <div class="form-group">
                <label for="policytitle">Policy Title</label>
                <input type="text" class="form-control" name="policytitle" placeholder="Enter Policy Title">
            </div>
            <div class="form-group">
                <label for="policytxt">Policy Text</label>
                <textarea class="form-control" name="policytxt" placeholder="Enter Policy Text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
