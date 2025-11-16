@extends('Admin.admin-components')

@section('admincomponents')

<link rel="stylesheet" href="css/Adminpanel/dashboard.css">

  <!-- Header --><div class="w3-main">
    <div class="w3-container">
        <h2 style="    text-align: center; margin-bottom: 60px;  margin-top: 60px;  font-weight: 900; color: white;">Dashboard Analytics</h2>
        <div class="dashboard-grid">
            <div class="dashboard-card w3-white">
                <h4>Growth</h4>
                <p>65%</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>New Users</h4>
                <p>15</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Profit</h4>
                <p>$15,152</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Messages</h4>
                <p>20</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Clients</h4>
                <p>30</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Expenses</h4>
                <p>$2,500</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Total Sales</h4>
                <p>$50,000</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Social Feed</h4>
                <p>15 Posts</p>
            </div>
            <div class="dashboard-card w3-white">
                <h4>Bounce Rate</h4>
                <p>30%</p>
            </div>
        </div>
    </div>
</div>

<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
   }
</script>



@endsection
