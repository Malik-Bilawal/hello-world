@extends('Admin.admin-components')

@section('admincomponents')
<link rel="stylesheet" href="css/Adminpanel/add-form.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>

    </style>
</head>
<body>
    <div class="containers">
        <div class="form-container">
            <div class="form-header">
                <h2>ADD CATEGORIES</h2>
            </div>
        <div class="new-div">
            <button onclick="document.location='/show-category'">SHOW AVAILABLE CATEGORIES </button>
         </div>  


            <form action="/categoryinserted" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">CATEGORY NAME</label>
                    <input type="text" class="form-control" name="categoryname" placeholder="Enter Category Name" required>
                </div>
                <div class="form-group">
                    <label for="skills">CATEGORY IMAGE</label>
                    <input type="file" class="form-control" name="cateimage" placeholder="Enter Category Image" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
   @endsection
