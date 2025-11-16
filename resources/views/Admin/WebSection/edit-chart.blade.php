@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="{{ asset('css/adminpanel/edit-chart.css') }}">

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>EDIT Chart</h2>
        </div>
        <form action="{{ url('/chartupdated/' . $chart->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="chartimage">Chart Image</label>
                <input type="file" class="form-control" name="chartimage">
                @if($chart->chart_image)
                    <img src="{{ asset('storage/app/public/chartassets/' . $chart->chart_image) }}" alt="Chart Image" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="charttitle">Chart Title</label>
                <input type="text" class="form-control" name="charttitle" value="{{ $chart->chart_title }}">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update Chart</button>
        </form>
    </div>
</div>
@endsection
