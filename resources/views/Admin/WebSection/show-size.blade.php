@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="{{ asset('css/Adminpanel/table.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <h2 class="order-list-headings"><span>SIZE</span>LIST</h2>
    <div class="new-div">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
 <div class="new-div">
    <button onclick="document.location='/add-size'">ADD NEW SIZES</button>
 </div>
    <div class="table-responsive">
    
  <table id="customTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Size Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sizes as $size)
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->size }}</td>
                        <td>
                            <a href="/sizeedit/{{ $size->id }}" class="btn btn-success">UPDATE</a>
                            <a href="/sizedeleted/{{ $size->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
