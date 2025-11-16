@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/add-form.css">

<div class="containers">
    <div class="form-container">
        <div class="form-header">
            <h2>ADD SIZING CHART</h2>
        </div>
        <div class="new-div">
            <button onclick="document.location='/show-chart'">SHOW AVAILABLE CHARTS</button>
         </div>
        <form action="/chartinserted" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="charttitle">CHART TITLE</label>
                <input type="text" class="form-control" name="charttitle" placeholder="Enter Chart Title">
            </div>
            <div class="form-group">
                <label for="chartimage">CHART IMAGE</label>
                <input type="file" class="form-control" name="chartimage" placeholder="Enter SIZING CHART">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
@endsection
