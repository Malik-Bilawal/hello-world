@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/add-form.css">

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>EDIT POLICY</h2>
        </div>
        <form action="/policyupdated/{{ $policy->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="policytitle">Policy Title</label>
                <input type="text" class="form-control" name="policytitle" value="{{ $policy->policytitle }}" placeholder="Enter Policy Title">
            </div>
            <div class="form-group">
                <label for="policytxt">Policy Text</label>
                <textarea class="form-control" name="policytxt" placeholder="Enter Policy Text">{{ $policy->policytxt }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@endsection
